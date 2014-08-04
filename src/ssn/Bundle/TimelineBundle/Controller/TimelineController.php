<?php

namespace ssn\Bundle\TimelineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TimelineController extends Controller
{
  public function sortPublicationDate($publication)
  {
    $max = count($publication);
    for ($i = 0; $i < $max; $i++)
      {
	for ($j = $max - 2; $j >= $i; $j--)
	  {
	    if ($publication[$j + 1]->getDate() > $publication[$j]->getDate())
	      {
		$temp = $publication[$j + 1];
		$publication[$j + 1] = $publication[$j];
		$publication[$j] = $temp;
	      }
	  }
      }
    return ($publication);
  }
  public function indexAction($page)
  {
    $i = 0;
    $friendlist = array();
    $collecPublicationList = array();
    $allPublication = array();

    if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
							    )) {
      throw new AccessDeniedException();
    }


    $access = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Access')->findAll();
    $user = $this->container->get('security.context')->getToken()->getUser();
    $friends = $user->getFriends();
    foreach ($friends as $friend)
      $friendlist[$i++] =  $friend->getFriendwith();
    $i = 0;
    foreach ($friendlist as $friend)
      if(is_object($friend))
	$collecPublicationList[$i++] = $friend->getPublications();
    $max = count($collecPublicationList);
    $collecPublicationList[$max+1] = $user->getPublications();
    $i = 0;
    foreach($collecPublicationList as $PublicationsByUser)
      foreach($PublicationsByUser as $Publication)
      $allPublication[$i++] = $Publication;

    $publicationSort = self::sortPublicationDate($allPublication);
    $adapter  = new ArrayAdapter($publicationSort);
    $pager    = new PagerFanta($adapter);
    $pager->setMaxPerPage(10);
    try {
      $pager->setCurrentPage($page);
    } catch (NotValidCurrentPageException $e) {
      throw new NotFoundHttpException();
    }

    return $this->render('ssnTimelineBundle:Timeline:index.html.twig', array('user' => $user, 'pager' => $pager, 'access' => $access));
  }
}
