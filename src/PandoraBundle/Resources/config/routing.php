<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('pandora_homepage', new Route('/', array(
    '_controller' => 'PandoraBundle:Default:index',
)));
$collection->add('pandora_user_profile', new Route('/user_information', array(
    '_controller' => 'PandoraBundle:Default:userInformation',
)));
return $collection;
