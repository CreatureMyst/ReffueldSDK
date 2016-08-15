<?php

namespace CreatureMyst\ReffueldSDK;

use CreatureMyst\ReffueldSDK\Interfaces\Reffueldable;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ApiCall
{
    /** @var Client */
    protected $client;

    /** @var Reffueldable */
    protected $model;

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return ApiCall
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return Reffueldable
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Reffueldable $model
     * @return ApiCall
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Creates instance.
     *
     * @param Client $client
     * @param Reffueldable $model
     * @return ApiCall
     */
    public static function createInstance(Client $client, Reffueldable $model)
    {
        return (new self())->setClient($client)->setModel($model);
    }

    protected function response(ResponseInterface $response)
    {
        return $response->getBody()->__toString();
    }


    ###

    /**
     * @param array $params
     * @return Reffueldable[]
     */
    public function findAll(array $params = [])
    {
        return $this->response($this->getClient()->get($this->getModel()->getSection(), [
            'query' => $params
        ]));
    }

    /**
     * @param $id
     * @return Reffueldable
     */
    public function findOne($id)
    {
        return $this->response($this->getClient()->get($this->getModel()->getSection() . '/' . $id));
    }

    /**
     * @param array $data
     * @return Reffueldable
     */
    public function create(array $data)
    {
        return $this->response(
            $this->getClient()->post($this->getModel()->getSection(), [
                'body' => json_encode($data)
            ])
        );
    }

    /**
     * @return Reffueldable
     */
    public function save()
    {
        return $this->response(
            $this->getClient()->put($this->getModel()->getSection() . '/' . $this->getModel()->getId(), [
                'body' => $this->getModel()->toJson(),
            ])
        );
    }
}
