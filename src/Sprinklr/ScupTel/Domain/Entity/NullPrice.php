<?php

namespace Sprinklr\ScupTel\Domain\Entity;

class NullPrice extends Price
{
    public function __construct()
    {
        $areaCode = new AreaCode(0, '');

        parent::__construct($areaCode, $areaCode, 0.0);
    }
}
