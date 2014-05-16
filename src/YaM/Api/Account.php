<?php


namespace YaM\Api;

use YaM\Http\Client;

class Account 
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
    public function getAccounts()
    {
        $response = $this->client->getClient()->get('/accounts.json')->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $accounts = $response->json();

        return $accounts;
    }

    /**
     * @param $accounts
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function editAccounts($accounts)
    {
        $response = $this->client->getClient()->put('/accounts.json', null, $accounts)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $accounts = $response->json();

        return $accounts;
    }

    /**
     * @param $login
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function deleteAccount($login)
    {
        $response = $this->client->getClient()->delete('/account/'.$login.'.json')->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $accounts = $response->json();

        return $accounts;
    }
}