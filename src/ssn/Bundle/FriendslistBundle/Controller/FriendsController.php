<?php
namespace ssn\Bundle\FriendslistBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ssn\Bundle\SuperAdminBundle\Entity\Friends;
use \DateTime;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class FriendsController extends Controller
{
    public function indexAction()
    {
      $i = 0;
      $friendlist = array();
      if (false === $this->get('security.context')->isGranted(
	 'IS_AUTHENTICATED_FULLY'
		            )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      $friends = $user->getFriends();
      foreach ($friends as $friend)
	{
	  if($friend->getId())
	    {
	      $friendlist[$i]['id'] =  $friend->getId();
	      $friendlist[$i++][0] =  $friend->getFriendwith();
	    }
	}
      return $this->render('ssnFriendslistBundle:Friends:index.html.twig',  array('friends' => $friendlist, 'user' => $user));
    }

    public function searchAction()
    {
      $user = $this->container->get('security.context')->getToken()->getUser();
      $mySearch = $this->get('request')->request->get('searchfield');
      $matchs = array();
      $em = $this->getDoctrine()->getEntityManager();
      $query = $em->createQuery(
     'SELECT u.id, u.avatar, u.username, u.presentation, u.city
      FROM ssnSuperAdminBundle:Users u
      WHERE u.username LIKE :searchTerm AND u.id NOT IN
       (SELECT IDENTITY(f.friendwith) FROM ssnSuperAdminBundle:Friends f  WHERE f.user = '.$user->getId().')
      ORDER BY u.username ASC'
				)->setParameter('searchTerm', $mySearch.'%');

      $matchs = $query->getResult();
      return $this->render('ssnFriendslistBundle:Friends:search.html.twig',  array('user' => $user, 'mySearch' => $mySearch, 'matchs' => $matchs));
    }

    public function addAction($friends)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $user = $this->container->get('security.context')->getToken()->getUser();
      $friendship = new Friends();
      $friendship->setBegin(new Datetime());
      $friendship->setUser($user);
      $friendship->setFriendwith($this->getDoctrine()->getRepository('ssnSuperAdminBundle:Users')->find($friends));
      $em->persist($friendship);
      $em->flush();

      return $this->redirect($this->generateUrl("friendslist"));
    }
    public function delAction($friend)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $user = $this->container->get('security.context')->getToken()->getUser();
      $friendwith = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Friends')->find($friend);
      $em->remove($friendwith);
      $em->flush();

      return $this->redirect($this->generateUrl("friendslist"));
    }
}
