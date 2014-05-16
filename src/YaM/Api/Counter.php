<?php


namespace YaM\Api;

use YaM\Http\Client;
use YaM\Model\Counter as CounterModel;

class Counter
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
    public function getCounters()
    {
        $response = $this->client->getClient()->get('/counters.json')->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $counters = $response->json();

        foreach ($counters['counters'] as $key => $counter) {
            $counters[$key] = new CounterModel($counter);
        }

        return $counters;
    }

    /**
     * @param $counterId
     *
     * @return CounterModel
     * @throws \Exception
     */
    public function getCounter($counterId)
    {
        $response = $this->client->getClient()->get("/counter/$counterId.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $counter = $response->json();

        return new CounterModel($counter['counter']);
    }

    /**
     * @param CounterModel $counter
     *
     * @return CounterModel
     * @throws \Exception
     */
    public function addCounter(CounterModel $counter)
    {
        $body = array(
            'name'         => $counter->getName(),
            'site'         => $counter->getSite(),
            'code_options' => $counter->getCodeOptions(),
            'mirrors'      => $counter->getMirrors(),
            'goals'        => $counter->getGoals()
        );

        $response = $this->client->getClient()->post("/counters.json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $counter = $response->json();

        return new CounterModel($counter);
    }

    /**
     * @param CounterModel $counter
     *
     * @return CounterModel
     * @throws \Exception
     */
    public function editCounter(CounterModel $counter)
    {
        $body = array(
            'name'         => $counter->getName(),
            'site'         => $counter->getSite(),
            'code_options' => $counter->getCodeOptions(),
            'mirrors'      => $counter->getMirrors(),
            'goals'        => $counter->getGoals()
        );

        $response = $this->client->getClient()->put("/counter" . $counter->getId() . ".json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $counter = $response->json();

        return new CounterModel($counter);
    }

    /**
     * @param CounterModel $counter
     *
     * @return CounterModel
     * @throws \Exception
     */
    public function deleteCounter(CounterModel $counter)
    {
        $response = $this->client->getClient()->put("/counter" . $counter->getId() . ".json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $counter = $response->json();

        return new CounterModel($counter);
    }

    /**
     * @param CounterModel $counter
     *
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function checkCounter(CounterModel $counter)
    {
        $response = $this->client->getClient()->get("/counter/" . $counter->getId() . "/check.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $result = $response->json();

        return $result;
    }
} 