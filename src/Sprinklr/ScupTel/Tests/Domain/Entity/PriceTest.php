<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\Entity\Price;
use Sprinklr\ScupTel\Domain\Entity\AreaCode;

class PriceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePriceShouldReturnWithValuePerMinuteAndOriginAreaCodeAndDestinyAreaCode()
    {
        $fromAreaCode = new AreaCode(11, 'São Paulo');
        $toAreaCode = new AreaCode(16, 'Ribeirão Preto');
        $valuePerMinute = 1.9;

        $price = new Price($fromAreaCode, $toAreaCode, $valuePerMinute);

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals($valuePerMinute, $price->getValuePerMinute());
    }
}
