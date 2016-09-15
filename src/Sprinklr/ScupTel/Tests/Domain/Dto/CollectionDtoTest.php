<?php

namespace Sprinklr\ScupTel\Tests\Domain\Dto;

use Sprinklr\ScupTel\Domain\Dto\CollectionDto;

class CollectionDtoTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDto()
    {
        $data = array(
            array('id' => 1, 'name' => 'Foo'),
            array('id' => 2, 'name' => 'Bar'),
        );

        $dto = new CollectionDto($data);

        $this->assertCount(2, $dto->getData());
        $this->assertEquals(2, $dto->getTotal());
    }
}
