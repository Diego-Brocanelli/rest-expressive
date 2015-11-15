<?php

namespace Core\Doctrine;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;

class BaseDoctrine
{
    /**
     * Configuration dev mode.
     *
     * @var boolean
     */
    private $devMode = false;

    /**
     * Path Entitys
     *
     * @var array
     */
    private $paths = array(__DIR__ . '/../../Api/Model');

    /**
     * EntityManager Doctrine
     * 
     * @var EntityManager
     */
    public $em;

    public function __construct()
    {
        // db configurations
        $dbParams = require __DIR__ . '/../../../config/dbConfiguration.php';

        $config = Setup::createConfiguration($this->devMode);

        // read annotations
        $driver = new AnnotationDriver(new AnnotationReader(), $this->paths);
        $config->setMetadataDriverImpl($driver);

        // register annotations
        AnnotationRegistry::registerFile(
            __DIR__ . '/../../../vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php'
        );
        // create entityManager
        $this->em = EntityManager::create($dbParams, $config);
    }
}
