<?php

namespace Sprinklr\ScupTel\Infrastructure\Repository;

use Sprinklr\ScupTel\Domain\DataFixture\PriceData;
use Sprinklr\ScupTel\Domain\Entity\NullPrice;
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

    public function find($fromAreaCode, $toAreaCode)
    {
        $prices = array(
            '11-16' => PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto(),
            '16-11' => PriceData::createPriceFromAreaCode16AndNameRibeiraoPretoToAreaCode11AndNameSaoPaulo(),
            '11-17' => PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol(),
            '17-11' => PriceData::createPriceFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo(),
            '11-18' => PriceData::createPriceFromAreaCode11AndNameSaoPauloToAreaCode18AndNameTupiPaulista(),
            '18-11' => PriceData::createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo(),
        );

        $key = sprintf('%s-%s', $fromAreaCode, $toAreaCode);

        if (false === array_key_exists($key, $prices)) {
            return new NullPrice();
        }

        return $prices[$key];
    }
}
