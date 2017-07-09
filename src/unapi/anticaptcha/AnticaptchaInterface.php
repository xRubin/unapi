<?php
namespace unapi\anticaptcha;

use GuzzleHttp\ClientInterface;

interface AnticaptchaInterface
{
    /**
     * @param ClientInterface $client
     * @return callable
     */
    public function getAnticaptchaPromise(ClientInterface $client);
}