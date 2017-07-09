<?php
namespace unapi\common\interfaces;

interface FactoryInterface
{
    /**
     * @param string $html
     * @return StatusInterface
     */
    public function factory($html);
}