<?php

namespace Sprinklr\ScupTel\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Repository\PriceRepositoryInterface;

class PriceRepository implements PriceRepositoryInterface
{
    public function findAll()
    {
        return array(
            PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto(),
            PriceData::createPriceFromAreaCode16AndNameRibeiraoPretoToAreaCode11AndNameSaoPaulo(),
            PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol(),
            PriceData::createPriceFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo(),
            PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode18AndNameTupiPaulista(),
            PriceData::createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo(),
        );
    }
}
