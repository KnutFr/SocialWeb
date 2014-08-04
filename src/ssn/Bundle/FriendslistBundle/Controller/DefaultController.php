<?php

namespace ssn\Bundle\FriendslistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ssnFriendslistBundle:Default:index.html.twig');
    }
}
