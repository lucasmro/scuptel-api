<?php

namespace Sprinklr\ScupTel\Tests\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;

class PlanRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $repository;

    protected function setUp()
    {
        $this->repository = $this->getMockBuilder('Sprinklr\ScupTel\Infrastructure\Repository\PlanRepository')
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
        $expectedPlans = array(
            PlanData::createPlanFaleMais30(),
            PlanData::createPlanFaleMais60(),
            PlanData::createPlanFaleMais120(),
        );

        $this->repository->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue($expectedPlans));

        $plans = $this->repository->findAll();

        $this->assertCount(3, $plans);
        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Plan', $plans[1]);
        $this->assertEquals(PlanData::createPlanFaleMais60(), $plans[1]);
    }
}
