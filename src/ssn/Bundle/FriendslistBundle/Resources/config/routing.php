<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_friendslist_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnFriendslistBundle:Default:index',
)));
$collection->add('friendslist', new Route('/', array(
     '_controller' => 'ssnFriendslistBundle:Friends:index',
																						     )));

$collection->add('searchfriend', new Route('/search', array(
      '_controller' => 'ssnFriendslistBundle:Friends:search',
)));

$collection->add('addfriends', new Route('/add/{friends}', array(
      '_controller' => 'ssnFriendslistBundle:Friends:add',
)));
$collection->add('delfriend', new Route('/del/{friend}', array(
      '_controller' => 'ssnFriendslistBundle:Friends:del',
)));
return $collection;
