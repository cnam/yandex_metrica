<?php


namespace YaM;

use YaM\Api\Counter;
use YaM\Api\CounterMethodFactory;
use YaM\Api\Delegate;
use YaM\Api\Account;
use YaM\Api\OAuth;
use YaM\Api\Stat;
use YaM\Http\Client;
use YaM\Core\Factory;

class Api extends Factory
{
    /**
     * @var int Идентификатор сайта зарегистрированного в системе mail.ru
     */
    private $clientId;
    /**
     * @var string Секретный ключ выданный mail.ru
     */
    private $secretKey;
    /**
     * @var Client обертка для guzzle/http/client С установленными необходимыми параметрами
     */
    private $client;

    /**
     * @var array
     */
    protected $stat;

    /**
     * @var
     */
    protected $counterFactory;

    /**
     * @var oAuth Класс для авторизации, получения токенов, по коду авторизации
     */
    protected $oAuth;

    protected $containers = array();

    /**
     * Параметры для авторизации сайта, если их нет,
     * Необходимо зарегистрировать сайт на
     *
     * @param int    $clientId
     * @param string $secretKey
     * @param null   $client
     */
    public function __construct($clientId, $secretKey, $client = null)
    {
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
        if ($this->client !== null) {
            $this->setClient($client);
        }

        $this->initialize($clientId, $secretKey);
    }

    /**
     * Установка токена для доступа к
     * данным api
     *
     * @param $token
     */
    public function setTokenAccess($token)
    {
        $this->client->setTokenAccess($token);
    }

    /**
     * initialize application
     */
    private function initialize($clientId, $secretKey)
    {
        $this->setClient(new Client($clientId, $secretKey));
    }

    /**
     * Установка клиента с замокаными данными для тестов
     *
     * @param $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * Возвращает класс для работы с функциями авторизации
     *
     * @return OAuth
     */
    public function getOauth()
    {
        if (null === $this->oAuth) {
            $this->oAuth = new OAuth($this->client, $this->clientId, $this->secretKey);
        }

        return $this->oAuth;
    }

    protected function map()
    {
        return array(
            'counters' => new Counter($this->client),
            'delegate'   => new Delegate($this->client),
            'account'   => new Account($this->client),
        );
    }

    protected function getStat($counterId)
    {
        if (!array_key_exists($counterId, $this->stat)) {

            $client = clone $this->client;
            $client->getClient()->setDefaultOption('query', array('id'=>$counterId));

            $this->stat[$counterId] = new Stat($client);
        }

        return $this->stat[$counterId];
    }

    protected function getCounterMethodFactory($counterId)
    {
        if (!array_key_exists($counterId, $this->stat)) {

            $client = clone $this->client;
            $client->getClient()->setDefaultOption('query', array('id'=>$counterId));

            $this->counterFactory[$counterId] = new CounterMethodFactory($this->client, $counterId);
        }

        return $this->counterFactory[$counterId];
    }
}