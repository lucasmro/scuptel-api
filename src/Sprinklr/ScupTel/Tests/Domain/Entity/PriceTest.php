<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\DataFixture\AreaCodeData;
use Sprinklr\ScupTel\Domain\DataFixture\PriceData;

class PriceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreatePriceShouldReturnWithValuePerMinuteAndOriginAreaCodeAndDestinyAreaCode()
    {
        $fromAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();
        $toAreaCode = AreaCodeData::createAreaCode16AndNameRibeiraoPreto();

        $price = PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(1.9, $price->getValuePerMinute());
    }
}
