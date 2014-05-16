<?php


namespace YaM\Api\Stat;

use YaM\Http\Client;

class Content 
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
    public function getPopulars(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/popular.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getEntrance(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/entrance.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getExit(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/exit.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getTitles(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/titles.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getUrlParam(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/url_param.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getUserVars(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/user_vars.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }

    /**
     * @param array $params
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getEcommerce(array $params)
    {
        $response = $this->client->getClient()->get('/stat/content/ecommerce.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }
} 