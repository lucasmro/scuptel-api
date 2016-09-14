<?php

namespace Sprinklr\ScupTel\Tests\Domain\Entity;

use Sprinklr\ScupTel\Domain\Entity\AreaCode;

class AreaCodeTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateAreaCodeShouldReturnWithCodeAndName()
    {
        $code = 11;
        $name = 'São Paulo';

        $areaCode = new AreaCode($code, $name);

        $this->assertEquals($code, $areaCode->getCode());
        $this->assertEquals($name, $areaCode->getName());
    }
}
