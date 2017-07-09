<?php
namespace unapi\fms\patent;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;
use unapi\common\interfaces\QueryInterface;
use unapi\fms\common\AbstractService;

/**
 * Class PatentService
 */
class PatentService extends AbstractService
{
    /**
     * @param ClientInterface $client
     * @return callable
     */
    protected function initialPage(ClientInterface $client)
    {
        return function () use ($client) {
            return $client->sendAsync(new Request('GET', '/info-service.htm?sid=2060'));
        };
    }

    /**
     * @param ClientInterface $client
     * @param QueryInterface $query
     * @return callable
     */
    protected function submitForm(ClientInterface $client, QueryInterface $query)
    {
        return function ($code) use ($client, $query) {
            /** @var PatentQuery $query */

            var_dump($query);
            var_dump($code . $code);

            return $client->sendAsync(new Request('POST', '/info-service.htm', [
                'form_params' => [
                    'sid' => 2060,
                    'form_name' => 'form',
                    'DOC_NUMBER' => $query->getNumber(),
                    'DOC_SERIE' => $query->getSeries(),
                    'captcha-input' => $code
                ]
            ]));
        };
    }
}