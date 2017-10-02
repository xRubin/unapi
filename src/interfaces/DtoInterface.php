<?php

namespace unapi\interfaces;

interface DtoInterface
{
    public static function toDto(array $data): DtoInterface;
}