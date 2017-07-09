<?php
namespace unapi\fms\anticaptcha;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use unapi\anticaptcha\AnticaptchaException;
use unapi\anticaptcha\AnticaptchaInterface;

class ChainedAnticaptcha implements AnticaptchaInterface
{
    /** @var AnticaptchaInterface[] */
    private $chain = [];
    
    public function addAnticaptcha(AnticaptchaInterface $anticaptcha, $tries = 1) {
        for ($i =0; $i < max(1, $tries); $i++ ) {
            $this->chain[] = $anticaptcha;
        }
    }

    /**
     * @param ClientInterface $client
     * @return callable
     */
    public function getAnticaptchaPromise(ClientInterface $client)
    {
        return function (ResponseInterface $response)  use ($client) {
            foreach ($this->chain as $anticaptcha) {
                try {
                    return call_user_func($anticaptcha->getAnticaptchaPromise($client), $response);
                } catch (\Exception $e) {}
            }
            
            throw new AnticaptchaException('Captcha not resolved');
        };
    }
}