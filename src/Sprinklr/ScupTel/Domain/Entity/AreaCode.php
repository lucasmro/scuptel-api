<?php

namespace Sprinklr\ScupTel\Domain\Entity;

class AreaCode
{
    private $code;
    private $name;

    /**
     * AreaCode constructor.
     *
     * @param int $code
     * @param string $name
     */
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * Get id
     *
     * @return int $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
}
