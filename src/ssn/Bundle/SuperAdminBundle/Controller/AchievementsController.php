<?php

namespace ssn\Bundle\SuperAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AchievementsController extends Controller
{
    public function indexAction()
    {
      $achievements = $this->getDoctrine()->getRepository('ssnSuperAdminBundle:Achievements')->findAll();
      return $this->render('ssnSuperAdminBundle:Achievements:index.html.twig', array('achievements' => $achievements));
    }
}
