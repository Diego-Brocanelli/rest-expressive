<?php

require __DIR__ . '/../vendor/autoload.php';

use Aura\Router\RouterFactory;
use Core\Doctrine\BaseDoctrine;
use Zend\Expressive\AppFactory;
use Zend\Expressive\Router\Aura as AuraBridge;

// router configuration
$auraRouter = (new RouterFactory())->newInstance();
$router     = new AuraBridge($auraRouter);
$api        = AppFactory::create(null, $router);

// basic configuration Doctrine
$baseDoctrine = new BaseDoctrine();
$entityManager = $baseDoctrine->em;
