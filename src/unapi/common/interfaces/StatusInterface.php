<?php
namespace unapi\common\interfaces;

/**
 * Interface StatusInterface
 */
interface StatusInterface
{
    /**
     * @return string
     */
    public function getCode();

    /**
     * @return string
     */
    public function getMessage();
}