<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('ssn_security_login', new Route('/', array(
    '_controller' => 'ssnSecurityBundle:Login:login',
)));

$collection->add('register', new Route('/register', array(
    '_controller' => 'ssnSecurityBundle:Register:register',
)));

$collection->add('losepassword', new Route('/losepassword', array(
	'_controller' => 'ssnSecurityBundle:Login:password',
	)));

$collection->add('login_check', new Route('/login_check', array()));

$collection->add('error', new Route('/error', array(
						    '_controller' => 'ssnSecurityBundle:Error:index',
)));

$collection->add('logout', new Route('/logout', array()));

return $collection;
