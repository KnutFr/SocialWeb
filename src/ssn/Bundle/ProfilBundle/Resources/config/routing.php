<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_profil_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnProfilBundle:Default:index',
)));

$collection->add('profil', new Route('/profil/{id}', array(
    '_controller' => 'ssnProfilBundle:Profil:index',
)));


return $collection;
