<?php

namespace unapi\dto;

class PhoneDto
{
    /** @var string */
    private $number;
    /**
     * @param string $number
     */
    public function __construct($number)
    {
        $this->number = preg_replace('/[^0-9]/', '', $number);
        $this->number = substr($this->number, -10, 10);
        if (strlen($this->number) !== 10)
            throw new \InvalidArgumentException('Incorrect Phone number');
    }
    /**
     * @param string $prepend
     * @return string
     */
    public function getNumber(string $prepend = ''): string
    {
        return $prepend . $this->number;
    }
}