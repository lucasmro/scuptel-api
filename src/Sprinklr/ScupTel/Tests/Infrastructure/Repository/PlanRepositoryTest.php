<?php

namespace Sprinklr\ScupTel\Tests\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PlanData;
use Sprinklr\ScupTel\Infrastructure\Repository\PlanRepository;

class PlanRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $repository;

    protected function setUp()
    {
        $this->repository = new PlanRepository();
    }

    protected function tearDown()
    {
        $this->repository = null;
    }

    public function testShouldReturnThreePlans()
    {
        $repositoryMock = $this->getMockBuilder('Sprinklr\ScupTel\Infrastructure\Repository\PlanRepository')
            ->disableOriginalConstructor()
            ->setMethods(array('findAll'))
            ->getMockForAbstractClass();

        $expectedPlans = array(
            PlanData::createPlanFaleMais30(),
            PlanData::createPlanFaleMais60(),
            PlanData::createPlanFaleMais120(),
        );

        $repositoryMock->expects($this->once())
            ->method('findAll')
            ->will($this->returnValue($expectedPlans));

        $plans = $repositoryMock->findAll();

        $this->assertCount(3, $plans);
        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Plan', $plans[1]);
        $this->assertEquals(PlanData::createPlanFaleMais60(), $plans[1]);
    }

    public function testShouldReturnAllThreeValidPlans()
    {
        $plans = $this->repository->findAll();

        $this->assertCount(3, $plans);
        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Plan', $plans[1]);
        $this->assertEquals(PlanData::createPlanFaleMais60(), $plans[1]);
    }

    public function testShouldReturnValidPlan()
    {
        $slug = 'falemais-30';

        $plan = $this->repository->find($slug);

        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Plan', $plan);
        $this->assertEquals($slug, $plan->getSlug());
    }

    public function testShouldReturnNullPlanWhenPlanIsNotFound()
    {
        $slug = 'invalid-plan';

        $plan = $this->repository->find($slug);

        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\NullPlan', $plan);
    }
}
