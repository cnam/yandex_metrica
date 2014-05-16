<?php


namespace YaM\Api;

use YaM\Api\Counter\Filter;
use YaM\Api\Counter\Goal;
use YaM\Api\Counter\Grant;
use YaM\Api\Counter\Operation;

use YaM\Core\Factory;

class CounterMethodFactory extends Factory
{

    protected $client;
    /**
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    protected function map()
    {
        return array(
            'filter'     => new Filter($this->client),
            'goal'       => new Goal($this->client),
            'grant'      => new Grant($this->client),
            'operations' => new Operation($this->client)
        );
    }
} 