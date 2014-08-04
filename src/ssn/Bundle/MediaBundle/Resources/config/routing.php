<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_media_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnMediaBundle:Default:index',
)));

$collection->add('mediahome', new Route('/media', array(
    '_controller' => 'ssnMediaBundle:Media:index',
)));
$collection->add('addalbum', new Route('/addalbum', array(
    '_controller' => 'ssnMediaBundle:Media:add',
)));
$collection->add('createalbum', new Route('/createalbum', array(
    '_controller' => 'ssnMediaBundle:Media:create',
)));
$collection->add('consultalbum', new Route('/consultalbum/{idalbum}', array(
    '_controller' => 'ssnMediaBundle:Media:consult',
)));
$collection->add('delalbum', new Route('/delalbum/{idalbum}', array(
    '_controller' => 'ssnMediaBundle:Media:del',
)));



$collection->add('addpicture', new Route('/addpicture/{idalbum}', array(
    '_controller' => 'ssnMediaBundle:Photo:add',
)));
$collection->add('delpicture', new Route('/delpicture/{idpicture}', array(
    '_controller' => 'ssnMediaBundle:Photo:del',
)));


return $collection;
