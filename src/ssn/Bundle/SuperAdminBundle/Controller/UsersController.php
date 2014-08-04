<?php

namespace ssn\Bundle\SuperAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {
      $users = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Users')->findAll();
      return $this->render('ssnSuperAdminBundle:Users:index.html.twig', array('users' => $users));
    }

    public function deleteAction($id)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $user = $em->getRepository('ssnSuperAdminBundle:Users')->find($id);

      if (!$user)
        throw $this->createNotFoundException('No users found for id '.$id);
      $em->remove($user);
      $em->flush();
    }
}
