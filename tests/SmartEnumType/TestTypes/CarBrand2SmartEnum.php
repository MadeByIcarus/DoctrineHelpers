<?php


namespace IcarusTests\SmartEnumType\TestTypes;


use Icarus\DoctrineHelpers\SmartEnumType\SmartEnumType;


final class CarBrand2SmartEnum extends SmartEnumType
{

    private const SKODA = "skoda";



    public function isSkoda()
    {
        return $this->compare(self::skoda());
    }



    public static function skoda()
    {
        return self::fromValue(self::SKODA);
    }
}