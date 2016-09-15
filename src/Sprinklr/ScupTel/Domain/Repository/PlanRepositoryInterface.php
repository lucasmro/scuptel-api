<?php

namespace Sprinklr\ScupTel\Domain\Repository;

interface PlanRepositoryInterface
{
    public function findAll();

    public function find($slug);
}
