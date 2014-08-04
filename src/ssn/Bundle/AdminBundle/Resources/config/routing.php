<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_admin_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnAdminBundle:Default:index',
)));
$collection->add('settings', new Route('/settings', array(
    '_controller' => 'ssnAdminBundle:Settings:index',
)));
return $collection;
