<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('timeline', new Route('/timeline/{page}', array(
    '_controller' => 'ssnTimelineBundle:Timeline:index',
    'page'        => 1,
)));

return $collection;
