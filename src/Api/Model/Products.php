<?php

namespace Api\Model;

use Core\Model\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Products extends Entity
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=30)
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(type="string", length=300)
     * @var string
     */
    protected $description;

    /**
     * @ORM\Column(type="integer")
     * @var integer
     */
    protected $quantity;
}
