<?php

namespace ssn\Bundle\PublicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ssnPublicationBundle:Default:index.html.twig', array('name' => $name));
    }
}
