<?php


namespace YaM\Api\Stat;

use YaM\Http\Client;

class Sources
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
    public function getSummary(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/summary.json', null, $params)->send();

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
    public function getSites(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/sites.json', null, $params)->send();

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
    public function getSearchEngines(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/search_engines.json', null, $params)->send();

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
    public function getPhrases(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/phrases.json', null, $params)->send();

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
    public function getMarketing(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/marketing.json', null, $params)->send();

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
    public function getDirectSummary(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/direct/summary.json', null, $params)->send();

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
    public function getDirectPlatform(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/direct/platforms.json', null, $params)->send();

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
    public function getDirectRegions(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/direct/regions.json', null, $params)->send();

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
    public function getTags(array $params)
    {
        $response = $this->client->getClient()->get('/stat/sources/direct/tags.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }
} 