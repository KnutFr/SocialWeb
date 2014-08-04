<?php

namespace ssn\Bundle\MediaBundle\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ssn\Bundle\SuperAdminBundle\Entity\Albums;
use \DateTime;

class MediaController extends Controller
{
    public function indexAction()
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
							      )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      $albums = $user->getAlbums();
      return $this->render('ssnMediaBundle:Media:index.html.twig', array('user' => $user, 'albums' => $albums));
    }
    public function addAction()
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                              )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      return $this->render('ssnMediaBundle:Media:add.html.twig', array('user' => $user));
    }
    public function createAction()
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                              )) {
        throw new AccessDeniedException();
      }

      $user = $this->container->get('security.context')->getToken()->getUser();
      $name = $this->get('request')->request->get('name');
      $localisation = $this->get('request')->request->get('localisation');
      $description = $this->get('request')->request->get('description');

      $myAlbum = new Albums();
      $myAlbum->setDate(new DateTime());
      $myAlbum->setName($name);
      $myAlbum->setPlace($localisation);
      $myAlbum->setUser($user);
      $myAlbum->setComments($description);

      $em = $this->getDoctrine()->getEntityManager();
      $em->persist($myAlbum);
      $em->flush();
      return $this->redirect($this->generateUrl("mediahome"));
   }
    public function consultAction($idalbum)
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                              )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      $album = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Albums')->find($idalbum);
      $em = $this->getDoctrine()->getEntityManager();
      $query = $em->createQuery(
     'SELECT f
      FROM ssnSuperAdminBundle:Friends f
      WHERE f.friendwith = '.$user->getId().' AND f.user = :iduser'
                                )->setParameter('iduser', $album->getUser()->getId());
      $friendship = $query->getResult();

      if(($user->getId() != $album->getUser()->getId()) && !$friendship)
	return $this->redirect($this->generateUrl("error"));
      else
      {
	$photos = $album->getPhotos();
	return $this->render('ssnMediaBundle:Media:consult.html.twig', array('user' => $user, 'album' => $album , 'photos' => $photos));
      }
    }

    public function delAction($idalbum)
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
							      )) {
	throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      $album = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Albums')->find($idalbum);
      $em = $this->getDoctrine()->getManager();
      $em->remove($album);
      $em->flush();
      return $this->redirect($this->generateUrl("mediahome"));
    }
}
