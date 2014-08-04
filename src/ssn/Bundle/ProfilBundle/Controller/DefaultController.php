<?php

namespace ssn\Bundle\ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ssnProfilBundle:Default:index.html.twig', array('name' => $name));
    }
}
