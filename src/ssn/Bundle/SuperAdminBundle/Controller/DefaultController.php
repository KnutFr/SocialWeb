<?php

namespace ssn\Bundle\SuperAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ssnSuperAdminBundle:Default:index.html.twig');
    }
}
