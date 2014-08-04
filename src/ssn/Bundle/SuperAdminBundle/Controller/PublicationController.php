<?php

namespace ssn\Bundle\SuperAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicationController extends Controller
{
    public function indexAction()
    {
      $publications = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Publication')->findAll();
      return $this->render('ssnSuperAdminBundle:Publication:index.html.twig', array('publications' => $publications));
    }
    public function deleteAction($id)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $publication = $em->getRepository('ssnSuperAdminBundle:Publication')->find($id);

      if (!$publication)
        throw $this->createNotFoundException('No publication found for id '.$id);
      $em->remove($user);
      $em->flush();
    }
}
