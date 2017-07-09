<?php
namespace unapi\fms\common;

/**
 * Class Client
 */
class Client extends \GuzzleHttp\Client
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config['base_uri'] = 'http://services.fms.gov.ru';
        $config['cookies'] = true;

        parent::__construct($config);
    }
}