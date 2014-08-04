<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();
$collection->add('ssn_publication_homepage', new Route('/hello/{name}', array(
    '_controller' => 'ssnPublicationBundle:Default:index',
)));
$collection->add('publishtext', new Route('/add', array(
    '_controller' => 'ssnPublicationBundle:Publication:Publicationtext',
)));
return $collection;
