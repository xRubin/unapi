<?php
namespace unapi\fms\common;

use unapi\anticaptcha\AnticaptchaInterface;
use unapi\common\interfaces\FactoryInterface;
use unapi\common\interfaces\QueryInterface;
use unapi\common\interfaces\ServiceInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\ClientInterface;

use function GuzzleHttp\Promise\task;

/**
 * Class AbstractService
 */
abstract class AbstractService implements ServiceInterface
{
    /** @var ClientInterface */
    private $client;

    /** @var AnticaptchaInterface */
    private $anticaptcha;

    /** @var FactoryInterface */
    private $statusFactory;

    /**
     * @param ClientInterface $client
     * @param AnticaptchaInterface $anticaptcha
     * @param FactoryInterface $statusFactory
     */
    public function __construct(ClientInterface $client, AnticaptchaInterface $anticaptcha, FactoryInterface $statusFactory)
    {
        $this->client = $client;
        $this->anticaptcha = $anticaptcha;
        $this->statusFactory = $statusFactory;
    }

    /**
     * @param QueryInterface $query
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getQueryPromise(QueryInterface $query)
    {
        return task($this->initialPage($this->client))
            ->then($this->resolveCaptcha($this->client))
            ->then($this->submitForm($this->client, $query))
            ->then($this->findStatus($this->client, $this->statusFactory));
    }

    /**
     * @param ClientInterface $client
     * @return callable
     */
    abstract protected function initialPage(ClientInterface $client);

    /**
     * @param ClientInterface $client
     * @return callable
     */
    protected function resolveCaptcha(ClientInterface $client)
    {
        return $this->anticaptcha->getAnticaptchaPromise($client);
    }

    /**
     * @param ClientInterface $client
     * @param QueryInterface $query
     * @return callable
     */
    abstract protected function submitForm(ClientInterface $client, QueryInterface $query);

    /**
     * @param ClientInterface $client
     * @param FactoryInterface $statusFactory
     * @return callable
     */
    protected function findStatus(ClientInterface $client, FactoryInterface $statusFactory)
    {
        return function (ResponseInterface $response) use ($client, $statusFactory) {
            return $statusFactory->factory($response->getBody()->getContents());
        };
    }
}