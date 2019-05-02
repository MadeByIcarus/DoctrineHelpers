<?php


namespace Icarus\DoctrineHelpers\SmartEnumType;


abstract class SmartEnumType
{

    protected $value;



    public function __construct($value)
    {
        $this->validate($value);
        $this->value = $value;
    }



    public static function fromValue($value)
    {
        return new static($value);
    }



    protected function validate($value)
    {
        $refl = new \ReflectionClass(static::class);

        $name = array_search($value, $refl->getConstants());
        if ($name === false) {
            throw new \InvalidArgumentException("Invalid value '$value' for " . static::class . ".");
        }
    }



    public function __toString()
    {
        return $this->value;
    }



    protected function compare(SmartEnumType $type): bool
    {
        return static::class === get_class($type) && $this->value === $type->__toString();
    }
}