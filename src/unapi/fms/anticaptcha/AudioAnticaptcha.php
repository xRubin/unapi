<?php
namespace unapi\fms\anticaptcha;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use unapi\anticaptcha\AnticaptchaInterface;

use function GuzzleHttp\Promise\unwrap;

class AudioAnticaptcha implements AnticaptchaInterface
{
    /**
     * @param ClientInterface $client
     * @return callable
     */
    public function getAnticaptchaPromise(ClientInterface $client) 
    {
        return function (ResponseInterface $response)  use ($client) {
            $client->request('HEAD', '/services/captcha.jpg');

            preg_match_all("/services\/captcha-audio\/.{28}\/\d\.mp3\?timestamp=(\d*)/", $response->getBody()->getContents(), $output_array);

            /** @var ResponseInterface[] $results */
            $results = unwrap(array_map(function ($path) use ($client) {
                return $client->sendAsync(new Request('GET', $path));
            }, $output_array[0]));

            foreach ($results as $key => $response) {
                var_dump($key, md5($response->getBody()->getContents()));
            }

            return 123456;
        };
    }
}