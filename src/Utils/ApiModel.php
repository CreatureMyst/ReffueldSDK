<?php

namespace CreatureMyst\ReffueldSDK\Utils;

use CreatureMyst\ReffueldSDK\Exception\ReffueldException;
use CreatureMyst\ReffueldSDK\Interfaces\Reffueldable;
use CreatureMyst\ReffueldSDK\Reffueld;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\ResponseInterface;

abstract class ApiModel implements Reffueldable
{
    const
        METHOD_GET = 'GET',
        METHOD_POST = 'POST',
        METHOD_PUT = 'PUT',
        METHOD_PATCH = 'PATCH',
        METHOD_DELETE = 'DELETE';

    /**
     * @return \GuzzleHttp\Client
     * @throws \CreatureMyst\ReffueldSDK\Exception\ConfigurationException
     */
    protected static function getClient()
    {
        return Reffueld::getClient();
    }

    public function save()
    {
        if (null == $this->created) {
            return $this->request(static::sectionName(), self::METHOD_POST, $this->persistBundle());
        }

        return $this->request(static::sectionName() . '/' . $this->id, self::METHOD_PUT, $this->persistBundle());
    }

    /**
     * @deprecated
     * @throws ReffueldException
     */
    public function delete()
    {
        throw new ReffueldException("Unsupported");
    }


    ## STATIC API CALLS

    public static function getInstance()
    {
        return new static();
    }

    /**
     * @param $id
     * @throws ReffueldException
     * @return Reffueldable
     */
    public static function findOne($id)
    {
        return self::request(static::sectionName() . '/' . $id);
    }

    /**
     * @param array $filters
     * @throws ReffueldException
     * @return Reffueldable[]
     */
    public static function findAll(array $filters = [])
    {
        return self::request(static::sectionName());
    }

    /**
     * @param $url
     * @param string $method
     * @param array $data Form data.
     * @return Reffueldable[]|Reffueldable|ResponseInterface
     * @throws ReffueldException
     */
    protected static function request($url, $method = self::METHOD_GET, array $data = [], $loadModel = true)
    {
        $client = static::getClient();

        $options = [];
        if (count($data)) {
            $options['json'] = $data;
            $options['debug'] = Reffueld::$debug;
        }

        try {
            $response = $client->request($method, $url, $options);
        } catch (ClientException $e) {
            throw $e;
        }

        return $loadModel ? self::loadModelProcess($response) : $response;
    }

    /**
     * @param ResponseInterface $response
     * @return array|Reffueldable|null
     * @throws ReffueldException
     */
    private static function loadModelProcess(ResponseInterface $response)
    {
        $data = $response->getBody()->getContents();
        $data = \GuzzleHttp\json_decode($data);

        if (!property_exists($data, '_meta')) {
            throw new ReffueldException("Undefined response object");
        }

        $model = null;
        $result = null;

        if ($data->_meta->object == 'list') {
            $result = [];

            foreach ($data->data as $item) {
                if (null === $model) {
                    $model = '\\CreatureMyst\\ReffueldSDK\\Model\\' . $item->_meta->object;
                }

                $result[] = static::loadModel($item->_meta->object, $item);
            }

            return $result;
        }

        return static::loadModel($data->_meta->object, $data);
    }

    /**
     * @param $modelName
     * @param $data
     * @return Reffueldable
     * @throws ReffueldException
     */
    private static function loadModel($modelName, $data)
    {
        $model = '\\CreatureMyst\\ReffueldSDK\\Model\\' . $modelName;

        if (!class_exists($model)) {
            throw new ReffueldException("Response object is not Reffueld Model");
        }

        $model = new $model();

        foreach ($data as $key => $item) {
            if ($key == '_meta') {
                continue;
            }

            if (is_object($item)) {
                $model->{$key} = self::loadModel($item->object, $item);
                continue;
            }

            $model->{$key} = $item;
        }

        return $model;
    }
}
