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

    /** @var Client */
    protected static $client;

    /** @var bool */
    public static $debug = false;

    /**
     * @param string $apiKey
     * @return void
     */
    public static function init($apiKey)
    {
        self::$client = new Client([
            'base_uri' => self::ENDPOINT,
            'timeout' => 10,
            'headers' => [
                'X-REFFUELD-APIKEY' => $apiKey,
            ]
        ]);
    }

    /**
     * @return Client
     * @throws ConfigurationException
     */
    public static function getClient()
    {
        if (!self::$client instanceof Client) {
            throw new ConfigurationException("Call init() first.");
        }

        return self::$client;
    }
}
