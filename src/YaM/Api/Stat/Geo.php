<?php


namespace YaM\Api\Stat;

use YaM\Http\Client;

class Geo 
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function get(array $params)
    {
        $response = $this->client->getClient()->get('/stat/geo.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }
} 