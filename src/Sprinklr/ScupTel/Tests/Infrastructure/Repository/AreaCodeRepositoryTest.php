<?php

namespace Sprinklr\ScupTel\Tests\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\AreaCodeData;
use Sprinklr\ScupTel\Domain\DataFixture\PlanData;

class AreaCodeRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $repository;

    protected function setUp()
    {
        $this->repository = $this->getMockBuilder('Sprinklr\ScupTel\Infrastructure\Repository\AreaCodeRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findAll'))
            ->getMockForAbstractClass();
    }

    protected function tearDown()
    {
        $this->repository = null;
    }

    public function testShouldReturnThreePlans()
    {
        $expectedAreaCodes = array(
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            AreaCodeData::createAreaCode16AndNameRibeiraoPreto(),
            AreaCodeData::createAreaCode17AndNameMirassol(),
            AreaCodeData::createAreaCode18AndNameTupiPaulista(),
        );

        $this->repository->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue($expectedAreaCodes));

        $areaCodes = $this->repository->findAll();

        $this->assertCount(4, $areaCodes);
        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\AreaCode', $areaCodes[2]);
        $this->assertEquals(AreaCodeData::createAreaCode17AndNameMirassol(), $areaCodes[2]);
    }
}
