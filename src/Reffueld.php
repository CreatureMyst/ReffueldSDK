<?php

namespace CreatureMyst\ReffueldSDK;

use CreatureMyst\ReffueldSDK\Interfaces\Reffueldable;
use GuzzleHttp\Client;

/**
 * Class Reffueld
 *
 * @package CreatureMyst\ReffueldSDK
 * @see https://www.reffueld.com
 */
class Reffueld
{
    const
        ENDPOINT = 'https://www.reffueld.com/api/v1/';      // Reffueld API EndPoint

    /** @var Client */
    protected $client;

    public function __construct($apiKey)
    {
        $this->client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout' => 10,
            'headers' => [
                'X-REFFUELD-APIKEY' => $apiKey,
            ]
        ]);
    }

    public function test()
    {
        return 'ads';
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }

    /**
     * @param Reffueldable $model
     * @return ApiCall
     */
    public function createApiCall(Reffueldable $model)
    {
        return ApiCall::createInstance($this->getClient(), $model);
    }
}
