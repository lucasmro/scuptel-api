<?php

namespace Sprinklr\ScupTel\Domain\Repository;

interface PriceRepositoryInterface
{
    public function findAll();

    public function find($fromAreaCode, $toAreaCode);
}
