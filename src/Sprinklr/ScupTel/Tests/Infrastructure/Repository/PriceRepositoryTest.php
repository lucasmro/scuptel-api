<?php

namespace Sprinklr\ScupTel\Tests\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Infrastructure\Repository\PriceRepository;

class PriceRepositoryTest extends \PHPUnit_Framework_TestCase
{
    private $repository;

    protected function setUp()
    {
        $this->repository = new PriceRepository();
    }

    protected function tearDown()
    {
        $this->repository = null;
    }

    public function testShouldReturnAllSixValidPrices()
    {
        $prices = $this->repository->findAll();

        $this->assertCount(6, $prices);
        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Price', $prices[3]);
        $this->assertEquals(PriceData::createPriceFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo(), $prices[3]);
    }

    public function testShouldReturnValidPrice()
    {
        $fromAreaCode = 11;
        $toAreaCode = 18;

        $price = $this->repository->find($fromAreaCode, $toAreaCode);

        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\Price', $price);
        $this->assertEquals($fromAreaCode, $price->getFromAreaCode()->getCode());
        $this->assertEquals($toAreaCode, $price->getToAreaCode()->getCode());
    }

    public function testShouldReturnNullPlanWhenPlanIsNotFound()
    {
        $fromAreaCode = 12;
        $toAreaCode = 21;

        $price = $this->repository->find($fromAreaCode, $toAreaCode);

        $this->assertInstanceOf('Sprinklr\ScupTel\Domain\Entity\NullPrice', $price);
    }
}
