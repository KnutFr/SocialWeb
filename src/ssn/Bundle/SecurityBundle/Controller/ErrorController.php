<?php

namespace ssn\Bundle\SecurityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ErrorController extends Controller
{
    public function indexAction()
    {
      if (false === $this->get('security.context')->isGranted(
        'IS_AUTHENTICATED_FULLY'
                                                              )) {
        throw new AccessDeniedException();
      }
      $user = $this->container->get('security.context')->getToken()->getUser();
      return $this->render('ssnSecurityBundle:Error:index.html.twig', array('user' => $user));
    }
}
