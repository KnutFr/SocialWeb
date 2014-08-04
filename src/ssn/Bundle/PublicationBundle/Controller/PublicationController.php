<?php

namespace ssn\Bundle\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ssn\Bundle\SuperAdminBundle\Entity\Publication;
use \DateTime;

class PublicationController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ssnPublicationBundle:Default:index.html.twig', array('name' => $name));
    }
    public function PublicationtextAction()
    {
      $user = $this->container->get('security.context')->getToken()->getUser();
      $myPublication = $this->get('request')->request->get('publication');
      $em = $this->getDoctrine()->getEntityManager();

      if(isset($myPublication) && $myPublication != "")
	{
	  $objPublication = new Publication();
	  $objPublication->setUser($user);
	  $objPublication->setDate(new DateTime());
	  $objPublication->setContent($myPublication);
	  $objPublication->setAccess($this->getDoctrine()->getRepository('ssnSuperAdminBundle:Access')->find($this->get('request')->request->get('access')));
	  $em->persist($objPublication);
	  $em->flush();
	}
      return $this->redirect($this->generateUrl("timeline"));
    }
}
