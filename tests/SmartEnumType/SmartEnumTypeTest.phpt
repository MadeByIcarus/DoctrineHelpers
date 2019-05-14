<?php

namespace IcarusTests\SmartEnumType;


use Icarus\StaticParameters\Parameters;
use Icarus\StaticParameters\StaticParameters;
use IcarusTests\SmartEnumType\TestTypes\CarBrand2SmartEnum;
use IcarusTests\SmartEnumType\TestTypes\CarBrandSmartEnum;
use Nette\Configurator;
use Tester\Assert;
use Tester\TestCase;


require_once __DIR__ . '/../bootstrap.php';

class SmartEnumTypeTest extends TestCase
{

    public function testEqual()
    {
        // same class, same values
        $pairs = [
            [CarBrandSmartEnum::skoda(), CarBrandSmartEnum::skoda(), true],
            [CarBrandSmartEnum::skoda(), CarBrandSmartEnum::bmw(), false],
            [CarBrandSmartEnum::skoda(), CarBrand2SmartEnum::skoda(), false],
            [CarBrandSmartEnum::skoda(), 'skoda', true],
            [CarBrandSmartEnum::skoda(), 'some-value', false]
        ];

        $method = new \ReflectionMethod(CarBrandSmartEnum::class, 'isEqualTo');
        $method->setAccessible(true);

        foreach ($pairs as $pair) {
            list($a, $b, $expected) = $pair;
            Assert::equal($expected, $method->invokeArgs($a, [$b]), "Is '".$a."'".($expected ? "" : " not")." equal to '".$b."'?");
        }
    }



    public function testValidate()
    {
        $valid = [
            'skoda',
            'bmw'
        ];
        $invalid = [
            'mercedes',
            'audi'
        ];

        foreach ($valid as $v) {
            Assert::noError(function () use ($v) {
                new CarBrandSmartEnum($v);
            });
        }

        foreach ($invalid as $v) {
            Assert::exception(function () use ($v) {
                new CarBrandSmartEnum($v);
            }, \InvalidArgumentException::class);
        }
    }
}

(new SmartEnumTypeTest())->run();