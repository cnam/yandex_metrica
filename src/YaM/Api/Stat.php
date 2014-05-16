<?php


namespace YaM\Api;

use YaM\Api\Stat\Content;
use YaM\Api\Stat\Demography;
use YaM\Api\Stat\Geo;
use YaM\Api\Stat\Sources;
use YaM\Api\Stat\Tech;
use YaM\Api\Stat\Traffic;
use YaM\Core\Factory;

class Stat extends Factory
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
            'content'    => new Content($this->client),
            'demography' => new Demography($this->client),
            'geo'        => new Geo($this->client),
            'summary'    => new Sources($this->client),
            'tech'       => new Tech($this->client),
            'traffic'    => new Traffic($this->client)
        );
    }
} 