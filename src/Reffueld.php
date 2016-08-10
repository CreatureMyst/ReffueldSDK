<?php

namespace CreatureMyst\ReffueldSDK;

use CreatureMyst\ReffueldSDK\Exception\ConfigurationException;
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

    /** @var string|null */
    protected $apiKey = null;

    /** @var Client */
    protected $client;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout' => 10,
        ]);
    }

    public function test()
    {
        $this->getApiKey();
        return 'ads';
    }

    /**
     * @return string
     * @throws ConfigurationException
     */
    protected function getApiKey()
    {
        if (null == $this->apiKey) {
            throw new ConfigurationException;
        }

        return $this->apiKey;
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }
}
