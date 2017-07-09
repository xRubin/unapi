<?php
namespace unapi\fms\passport;

use GuzzleHttp\ClientInterface;
use unapi\common\interfaces\QueryInterface;
use unapi\anticaptcha\AnticaptchaInterface;
use unapi\common\interfaces\FactoryInterface;
use unapi\fms\common\AbstractService;
use unapi\fms\anticaptcha\AudioAnticaptcha;

/**
 * Class PassportService
 */
class PassportService extends AbstractService
{
    public function __construct(ClientInterface $client, AnticaptchaInterface $anticaptcha = null, FactoryInterface $statusFactory = null)
    {
        if (null === $anticaptcha)
            $anticaptcha = new AudioAnticaptcha();
        
        if (null === $statusFactory)
            $statusFactory = new PassportStatusFactory();

        parent::__construct($client, $anticaptcha, $statusFactory);
    }

    /**
     * @param ClientInterface $client
     * @return callable
     */
    protected function initialPage(ClientInterface $client)
    {
        return function () use ($client) {
            return $client->requestAsync('GET', '/info-service.htm?sid=2000');
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
            /** @var PassportQuery $query */

            var_dump($query);
            var_dump($code . $code);

            return $client->requestAsync('POST', '/info-service.htm', [
                'form_params' => [
                    'sid' => 2000,
                    'form_name' => 'form',
                    'DOC_NUMBER' => $query->getNumber(),
                    'DOC_SERIE' => $query->getSeries(),
                    'captcha-input' => $code
                ]
            ]);
        };
    }
}