<?php

namespace Sprinklr\ScupTel\Domain\Dto;

class CollectionDto
{
    private $data;
    private $total;

    public function __construct($data)
    {
        $this->data = $data;
        $this->total = count($this->data);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTotal()
    {
        return $this->total;
    }
}
