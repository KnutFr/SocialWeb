<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_achievements_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnAchievementsBundle:Default:index',
)));
$collection->add('achivementlist', new Route('/achievement', array(
    '_controller' => 'ssnAchievementsBundle:Achievements:index',
)));
return $collection;
