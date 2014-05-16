<?php


namespace YaM\Api;

use YaM\Http\Client;

class Delegate 
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getDelegates()
    {
        $response = $this->client->getClient()->get('/delegates.json')->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $delegates = $response->json();

        return $delegates;
    }

    /**
     * @param array $delegates
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function editDelegates(array $delegates)
    {
        $response = $this->client->getClient()->put('/delegates.json', null, $delegates)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $delegates = $response->json();

        return $delegates;
    }

    /**
     * @param array $delegate
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function addDelegate(array $delegate)
    {
        $response = $this->client->getClient()->post('/delegates.json', null, $delegate)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $delegates = $response->json();

        return $delegates;
    }

    /**
     * @param $delegateLogin
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function deleteDelegate($delegateLogin)
    {
        $response = $this->client->getClient()->delete('/delegate/'.$delegateLogin.'.json')->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $delegates = $response->json();

        return $delegates;
    }
} 