<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\DataFixture\AreaCodeData;

class AreaCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateShouldReturnAreaCode11AndNameSaoPaulo()
    {
        $areaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();

        $this->assertEquals(11, $areaCode->getCode());
        $this->assertEquals('São Paulo', $areaCode->getName());
    }

    public function testCreateShouldReturnAreaCode17AndNameMirassol()
    {
        $areaCode = AreaCodeData::createAreaCode17AndNameMirassol();

        $this->assertEquals(17, $areaCode->getCode());
        $this->assertEquals('Mirassol', $areaCode->getName());
    }

    public function testCreateShouldReturnAreaCode18AndNameTupiPaulista()
    {
        $areaCode = AreaCodeData::createAreaCode18AndNameTupiPaulista();

        $this->assertEquals(18, $areaCode->getCode());
        $this->assertEquals('Tupi Paulista', $areaCode->getName());
    }
}
