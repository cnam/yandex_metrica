<?php


namespace YaM\Api\Stat;

use YaM\Http\Client;

class Demography 
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
    public function getAgeGender(array $params)
    {
        $response = $this->client->getClient()->get('/stat/demography/age_gender.json', null, $params)->send();

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
    public function getDemographyStructure(array $params)
    {
        $response = $this->client->getClient()->get('/stat/demography/structure.json', null, $params)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        return $response->json();
    }
} 