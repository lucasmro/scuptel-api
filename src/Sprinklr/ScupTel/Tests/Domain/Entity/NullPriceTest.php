<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\Entity\AreaCode;
use Sprinklr\ScupTel\Domain\Entity\NullPrice;

class NullPriceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePriceShouldReturnWithValuePerMinuteAndOriginAreaCodeAndDestinyAreaCode()
    {
        $areaCode = new AreaCode(0, '');
        $price = new NullPrice();

        $this->assertEquals($areaCode, $price->getFromAreaCode());
        $this->assertEquals($areaCode, $price->getToAreaCode());
        $this->assertEquals(0.0, $price->getValuePerMinute());
    }
}
