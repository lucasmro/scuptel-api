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

    public function testCreatePriceShouldReturnFromAreaCode16AndToAreaCode11AndNameSaoPaulo()
    {
        $fromAreaCode = AreaCodeData::createAreaCode16AndNameRibeiraoPreto();
        $toAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();

        $price = PriceData::createPriceFromAreaCode16AndNameRibeiraoPretoToAreaCode11AndNameSaoPaulo();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(2.9, $price->getValuePerMinute());
    }

    public function testCreatePriceShouldReturnFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol()
    {
        $fromAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();
        $toAreaCode = AreaCodeData::createAreaCode17AndNameMirassol();

        $price = PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(1.7, $price->getValuePerMinute());
    }

    public function testCreatePriceShouldReturnFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo()
    {
        $fromAreaCode = AreaCodeData::createAreaCode17AndNameMirassol();
        $toAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();

        $price = PriceData::createPriceFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(2.7, $price->getValuePerMinute());
    }

    public function testCreatePriceShouldReturnFromAreaCode11AndNameSaoPauloToAreaCode18AndNameTupiPaulista()
    {
        $fromAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();
        $toAreaCode = AreaCodeData::createAreaCode18AndNameTupiPaulista();

        $price = PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode18AndNameTupiPaulista();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(0.9, $price->getValuePerMinute());
    }

    public function testCreatePriceShouldReturnFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo()
    {
        $fromAreaCode = AreaCodeData::createAreaCode18AndNameTupiPaulista();
        $toAreaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();

        $price = PriceData::createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo();

        $this->assertEquals($fromAreaCode, $price->getFromAreaCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode());
        $this->assertEquals(1.9, $price->getValuePerMinute());
    }
}
