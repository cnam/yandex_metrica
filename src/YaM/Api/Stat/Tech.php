<?php


namespace YaM\Api\Stat;

use YaM\Http\Client;

class Tech 
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
    public function getBrowsers(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/browsers.json', null, $params)->send();

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
    public function getOs(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/os.json', null, $params)->send();

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
    public function getDisplay(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/display.json', null, $params)->send();

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
    public function getMobile(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/display.json', null, $params)->send();

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
    public function getFlash(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/flash.json', null, $params)->send();

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
    public function getSilverLight(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/silverlight.json', null, $params)->send();

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
    public function getJava(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/java.json', null, $params)->send();

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
    public function getCookies(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/cookies.json', null, $params)->send();

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
    public function getJavascript(array $params)
    {
        $response = $this->client->getClient()->get('/stat/tech/javascript.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }
} 