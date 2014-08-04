<?php

namespace ssn\Bundle\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ssnAdminBundle:Default:index.html.twig');
    }
}
