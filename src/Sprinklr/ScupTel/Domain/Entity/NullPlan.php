<?php

namespace Sprinklr\ScupTel\Domain\Entity;

class NullPlan extends Plan
{
    public function __construct()
    {
        parent::__construct('', '', 0, 0.0);
    }
}
