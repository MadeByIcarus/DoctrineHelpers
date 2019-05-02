<?php


namespace IcarusTests\SmartEnumType\TestTypes;


use Icarus\DoctrineHelpers\SmartEnumType\SmartEnumType;


final class CarBrandSmartEnum extends SmartEnumType
{

    private const SKODA = "skoda";
    private const BMW = "bmw";



    public function isBmw()
    {
        return $this->compare(self::bmw());
    }



    public static function bmw()
    {
        return self::fromValue(self::BMW);
    }



    public function isSkoda()
    {
        return $this->compare(self::skoda());
    }



    public static function skoda()
    {
        return self::fromValue(self::SKODA);
    }
}