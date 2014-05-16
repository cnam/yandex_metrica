<?php


namespace YaM\Api\Counter;

use YaM\Http\Client;
use YaM\Model\Filter as FilterModel;

class Filter
{

    /**
     * @var Client
     */
    protected $client;

    protected $counterId;

    /**
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @return array|bool|float|int|string
     * @throws \Exception
     */
    public function getFilters()
    {
        $response = $this->client->getClient()->get("/counter/".$this->counterId."/filters.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $filters = $response->json();

        foreach ($filters['goals'] as $key => $filter) {
            $filters[$key] = new FilterModel($filter);
        }

        return $filters;
    }

    /**
     * @param $goalId
     *
     * @return FilterModel
     * @throws \Exception
     */
    public function getFilter($goalId)
    {
        $response = $this->client->getClient()->get("/counter/".$this->counterId."/filter/$goalId.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $filter = $response->json();

        return new FilterModel($filter);
    }

    /**
     * @param FilterModel $filter
     *
     * @return FilterModel
     * @throws \Exception
     */
    public function addFilter(FilterModel $filter)
    {
        $body = array(
            'action' => $filter->getAction(),
            'attr' => $filter->getAttr(),
            'type' => $filter->getType(),
            'value' => $filter->getValue(),
            'status' => $filter->getStatus()
        );

        $response = $this->client->getClient()->post("/counter/".$this->counterId."/filters.json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $filter = $response->json();

        return new FilterModel($filter);
    }

    /**
     * @param FilterModel $filter
     *
     * @return FilterModel
     * @throws \Exception
     */
    public function editFilter(FilterModel $filter)
    {
        $body = array(
            'action' => $filter->getAction(),
            'attr' => $filter->getAttr(),
            'type' => $filter->getType(),
            'value' => $filter->getValue(),
            'status' => $filter->getStatus()
        );

        $response = $this->client->getClient()->put("/counter/".$this->counterId."/filter/".$filter->getId().".json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $filter = $response->json();

        return new FilterModel($filter);
    }

    /**
     * @param FilterModel $filter
     *
     * @return FilterModel
     * @throws \Exception
     */
    public function deleteFilter(FilterModel $filter)
    {
        $response = $this->client->getClient()->delete("/counter/".$this->counterId."/filter/".$filter->getId().".json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $filter = $response->json();

        return new FilterModel($filter);
    }
}