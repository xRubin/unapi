<?php
namespace unapi\fms\anticaptcha;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use unapi\anticaptcha\AnticaptchaInterface;
use unapi\anticaptcha\ServiceInterface;

class ImageAnticaptcha implements AnticaptchaInterface
{
    /** @var ServiceInterface */
    private $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }
        /**
         * @param ClientInterface $client
         * @return callable
         */
    public function getAnticaptchaPromise(ClientInterface $client)
    {
        return function (ResponseInterface $response)  use ($client) {
            $image = $client->request('GET', '/services/captcha.jpg')->getBody()->getContents();

            // todo

            return 123456;
        };
    }
}