<?php


namespace YaM\Http;

use Guzzle\Http\Client as GuzzleClient;

class Client 
{
    const API_URL = 'http://api-metrika.yandex.ru';

    /**
     * @var GuzzleClient
     */
    private $client;

    public function __construct($clientId, $secretKey)
    {
        $this->client = new GuzzleClient(self::API_URL);
        $this->client->setDefaultOption('header',array('Content-Type' => 'application/json'));
        /*$this->client->setDefaultOption('auth', array($clientId, $secretKey));*/
    }

    /**
     * Возвращает Guzzle клиент
     *
     * @return GuzzleClient
     */
    public function getClient()
    {
        return $this->client;
    }

    public function setTokenAccess($token)
    {
        $this->client->setDefaultOption('query', array('oauth_token' => $token));
    }
} 