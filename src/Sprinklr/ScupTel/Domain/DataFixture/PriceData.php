<?php

namespace Sprinklr\ScupTel\Domain\DataFixture;

use Sprinklr\ScupTel\Domain\Entity\Price;

class PriceData
{
    public static function createPriceFromAreaCode11AndNameSaoPauloToAreaCode16AndNameRibeiraoPreto()
    {
        return new Price(
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            AreaCodeData::createAreaCode16AndNameRibeiraoPreto(),
            1.9
        );
    }

    public static function createPriceFromAreaCode16AndNameRibeiraoPretoToAreaCode11AndNameSaoPaulo()
    {
        return new Price(
            AreaCodeData::createAreaCode16AndNameRibeiraoPreto(),
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            2.9
        );
    }

    public static function createPriceFromAreaCode11AndNameSaoPauloToAreaCode17AndNameMirassol()
    {
        return new Price(
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            AreaCodeData::createAreaCode17AndNameMirassol(),
            1.7
        );
    }

    public static function createPriceFromAreaCode17AndNameMirassolToAreaCode11AndNameSaoPaulo()
    {
        return new Price(
            AreaCodeData::createAreaCode17AndNameMirassol(),
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            2.7
        );
    }

    public static function createPriceFromAreaCode11AndNameSaoPauloToAreaCode18AndNameTupiPaulista()
    {
        return new Price(
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            AreaCodeData::createAreaCode18AndNameTupiPaulista(),
            0.9
        );
    }

    public static function createPriceFromAreaCode18AndNameTupiPaulistaToAreaCode11AndNameSaoPaulo()
    {
        return new Price(
            AreaCodeData::createAreaCode18AndNameTupiPaulista(),
            AreaCodeData::createAreaCode11AndNameSaoPaulo(),
            1.9
        );
    }
}
