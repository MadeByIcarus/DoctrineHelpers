<?php


namespace Icarus\DoctrineHelpers\Entities\Attributes;


use Doctrine\ORM\Mapping as ORM;


/**
 * Trait SignedIdentifier
 * @package Icarus\DoctrineHelpers\Entities\Attributes
 *
 * This replaces the deprecated trait Nettrine\ORM\Entity\Attributes\Id which was not unsigned and therefore the trait Identifier caused problems with migrations.
 */
trait SignedIdentifier
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;



    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }



    public function __clone()
    {
        $this->id = NULL;
    }

}
