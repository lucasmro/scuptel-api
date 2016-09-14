<?php

namespace Sprinklr\ScupTel\Domain\DataFixture;

use Sprinklr\ScupTel\Domain\Entity\AreaCode;

class AreaCodeData
{
    public static function createAreaCode11AndNameSaoPaulo()
    {
        return new AreaCode(11, 'São Paulo');
    }

    public static function createAreaCode16AndNameRibeiraoPreto()
    {
        return new AreaCode(16, 'Ribeirão Preto');
    }

    public static function createAreaCode17AndNameMirassol()
    {
        return new AreaCode(17, 'Mirassol');
    }

    public static function createAreaCode18AndNameTupiPaulista()
    {
        return new AreaCode(18, 'Tupi Paulista');
    }
}
