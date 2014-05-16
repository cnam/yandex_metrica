<?php

namespace YaM\Api\Counter;

use YaM\Http\Client;
use YaM\Model\Grant as GrantModel;

class Grant
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
    public function getGrants()
    {
        $response = $this->client->getClient()->get("/counter/" . $this->counterId . "/grants.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $grants = $response->json();

        foreach ($grants['grants'] as $key => $grant) {
            $grants[$key] = new GrantModel($grant);
        }

        return $grants;
    }

    /**
     * @param $grantId
     *
     * @return GrantModel
     * @throws \Exception
     */
    public function getGrant($grantId)
    {
        $response = $this->client->getClient()->get("/counter/" . $this->counterId . "/grant" . $grantId . ".json")
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $grant = $response->json();

        return new GrantModel($grant['grant']);
    }

    /**
     * @param GrantModel $grant
     *
     * @return GrantModel
     * @throws \Exception
     */
    public function addGrant(GrantModel $grant)
    {
        $body     = array(
            'perm'       => $grant->getPerm(),
            'user_login' => $grant->getLogin(),
            'comment'    => $grant->getComment()
        );
        $response = $this->client->getClient()->post("/counter/" . $this->counterId . "/grants.json", null, $body)
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $grant = $response->json();

        return new GrantModel($grant['grant']);
    }

    /**
     * @param GrantModel $grant
     *
     * @return GrantModel
     * @throws \Exception
     */
    public function editGrant(GrantModel $grant)
    {
        $body     = array(
            'perm'       => $grant->getPerm(),
            'user_login' => $grant->getLogin(),
            'comment'    => $grant->getComment()
        );
        $response = $this->client->getClient()->put("/counter/" . $this->counterId . "/grant/".$grant->getId().".json", null, $body)
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $grant = $response->json();

        return new GrantModel($grant['grant']);
    }

    /**
     * @param GrantModel $grant
     *
     * @return GrantModel
     * @throws \Exception
     */
    public function deleteGrant(GrantModel $grant)
    {
        $response = $this->client->getClient()->delete("/counter/" . $this->counterId . "/grant/".$grant->getId().".json", null, $body)
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $grant = $response->json();

        return new GrantModel($grant['grant']);
    }
}