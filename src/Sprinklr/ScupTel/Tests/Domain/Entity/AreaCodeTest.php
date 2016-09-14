<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\DataFixture\AreaCodeData;

class AreaCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAreaCodeShouldReturnWithCodeAndName()
    {
        $areaCode = AreaCodeData::createAreaCode11AndNameSaoPaulo();

        $this->assertEquals(11, $areaCode->getCode());
        $this->assertEquals('São Paulo', $areaCode->getName());
    }
}
