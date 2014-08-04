<?php

namespace ssn\Bundle\AchievementsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ssnAchievementsBundle:Default:index.html.twig', array('name' => $name));
    }
}
