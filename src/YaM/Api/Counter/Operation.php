<?php

namespace YaM\Api\Counter;

use YaM\Http\Client;
use YaM\Model\Operation as OperationModel;

class Operation
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
    public function getOperations()
    {
        $response = $this->client->getClient()->get("/counter/" . $this->counterId . "/operations.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $operations = $response->json();

        foreach ($operations['operations'] as $key => $goal) {
            $operations[$key] = new OperationModel($goal);
        }

        return $operations;
    }

    /**
     * @param $operationId
     *
     * @return OperationModel
     * @throws \Exception
     */
    public function getOperation($operationId)
    {
        $response = $this->client->getClient()->get("/counter/" . $this->counterId . "/operation/$operationId.json")
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $operation = $response->json();

        return new OperationModel($operation['operation']);
    }

    /**
     * @param OperationModel $operation
     *
     * @return OperationModel
     * @throws \Exception
     */
    public function addOperation(OperationModel $operation)
    {
        $body = array(
            'action' => $operation->getAction(),
            'attr'   => $operation->getAttr(),
            'value'  => $operation->getValue(),
            'status' => $operation->getStatus()
        );

        $response = $this->client->getClient()->get("/counter/" . $this->counterId . "/operations.json", null, $body)
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $operation = $response->json();

        return new OperationModel($operation['operation']);
    }

    /**
     * @param OperationModel $operation
     *
     * @return OperationModel
     * @throws \Exception
     */
    public function editOperation(OperationModel $operation)
    {
        $body = array(
            'action' => $operation->getAction(),
            'attr'   => $operation->getAttr(),
            'value'  => $operation->getValue(),
            'status' => $operation->getStatus()
        );

        $response = $this->client->getClient()->put("/counter/" . $this->counterId . "/operation/".$operation->getid().".json", null, $body)
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $operation = $response->json();

        return new OperationModel($operation['operation']);
    }

    /**
     * @param OperationModel $operation
     *
     * @return OperationModel
     * @throws \Exception
     */
    public function deleteOperation(OperationModel $operation)
    {
        $response = $this->client->getClient()->delete("/counter/" . $this->counterId . "/operation/".$operation->getid().".json")
            ->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $operation = $response->json();

        return new OperationModel($operation['operation']);
    }
} 