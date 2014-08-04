<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_super_admin_homepage', new Route('/hello/{name}', array(
     '_controller' => 'ssnSuperAdminBundle:Default:index',
 )));
$collection->add('usersadmin', new Route('/usersadmin', array(
     '_controller' => 'ssnSuperAdminBundle:Users:index',
		  )));
$collection->add('publicationsadmin', new Route('/publicationsadmin', array(
     '_controller' => 'ssnSuperAdminBundle:Publication:index',
		  )));
$collection->add('achievementadmin', new Route('/achievementadmin', array(
    '_controller' => 'ssnSuperAdminBundle:Achievements:index',
)));
return $collection;
