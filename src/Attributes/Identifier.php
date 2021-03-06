<?php


namespace Icarus\DoctrineHelpers\Entities\Attributes;


use Doctrine\ORM\Mapping as ORM;


trait Identifier
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", options={"unsigned"=true})
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
