<?php
namespace unapi\common\interfaces;

use GuzzleHttp\Promise\PromiseInterface;

/**
 * Interface ServiceInterface
 */
interface ServiceInterface
{
    /**
     * @param QueryInterface $query
     * @return PromiseInterface
     */
    public function getQueryPromise(QueryInterface $query);
}