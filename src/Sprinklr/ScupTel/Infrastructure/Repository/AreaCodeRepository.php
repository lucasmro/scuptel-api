<?php

namespace Sprinklr\ScupTel\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\AreaCodeData;
use Sprinklr\ScupTel\Domain\Repository\AreaCodeRepositoryInterface;

class AreaCodeRepository implements AreaCodeRepositoryInterface
{
    public function findAll()
    {
        return array(
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            AreaCodeData::createAreaCode16AndNameRibeiraoPreto(),
            AreaCodeData::createAreaCode17AndNameMirassol(),
            AreaCodeData::createAreaCode18AndNameTupiPaulista(),
        );
    }
}
