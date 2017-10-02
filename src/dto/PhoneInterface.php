<?php

namespace unapi\dto;

interface PhoneInterface
{
    /**
     * @param string $prepend
     * @return string
     */
    public function getNumber(string $prepend = ''): string;
}