<?php

namespace YaM\Api\Counter;

use YaM\Http\Client;
use YaM\Model\Goal as GoalModel;

class Goal
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
    public function getGoals()
    {
        $response = $this->client->getClient()->get("/counter/$this->counterId/goals.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $goals = $response->json();

        foreach ($goals['goals'] as $key => $goal) {
            $goals[$key] = new GoalModel($goal);
        }

        return $goals;
    }

    /**
     * @param $id
     *
     * @return GoalModel
     * @throws \Exception
     */
    public function getGoal($id)
    {
        $response = $this->client->getClient()->get("/counter/$this->counterId/goals/$id.json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $goal = $response->json();

        return new GoalModel($goal['goal']);
    }

    /**
     * @param GoalModel $goal
     *
     * @return GoalModel
     * @throws \Exception
     */
    public function addGoal(GoalModel $goal)
    {
        $body = array(
            'name' => $goal->getName(),
            'type' => $goal->getType(),
            'depth' => $goal->getDepth(),
            'conditions' => $goal->getConditions(),
            'flag' => $goal->getFlag()
        );

        $response = $this->client->getClient()->post("/counter/".$this->counterId."/goals.json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $goal = $response->json();

        return new GoalModel($goal['goal']);
    }

    /**
     * @param GoalModel $goal
     *
     * @return GoalModel
     * @throws \Exception
     */
    public function editGoal(GoalModel $goal)
    {
        $body = array(
            'name' => $goal->getName(),
            'type' => $goal->getType(),
            'depth' => $goal->getDepth(),
            'conditions' => $goal->getConditions(),
            'flag' => $goal->getFlag()
        );

        $response = $this->client->getClient()->put("/counter/".$this->counterId."/goal/".$goal->getId().".json", null, $body)->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $goal = $response->json();

        return new GoalModel($goal['goal']);
    }

    /**
     * @param GoalModel $goal
     *
     * @return GoalModel
     * @throws \Exception
     */
    public function deleteGoal(GoalModel $goal)
    {
        $response = $this->client->getClient()->delete("/counter/".$this->counterId."/goal/".$goal->getId().".json")->send();

        if ($response->getStatusCode() != 200) {
            throw new \Exception('invalid status code');
        }

        $goal = $response->json();

        return new GoalModel($goal['goal']);
    }
} 