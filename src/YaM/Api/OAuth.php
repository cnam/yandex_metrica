<?php


namespace YaM\Api;

use YaM\Http\Client;
use Guzzle\Http\QueryString;
use Guzzle\Http\Url;

class OAuth 
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var int
     */
    private $clientId;

    /**
     * Пароль для basic авторизации
     *
     * @var string
     */
    private $secretKey;

    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * @param Client $client
     * @param int    $clientId Идентификатор кдиента
     * @param string $secretKey Пароль для basic авторизации
     */
    public function __construct($client, $clientId, $secretKey)
    {
        $this->client = $client;
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
    }

    /**
     * Запрос На авторизацию
     *
     * @param string $redirectUrl Урл для
     * @param string $state       дополнительный get параметр который подставляется к урл
     *
     * @return string
     */
    public function getLoginUrl($redirectUrl, $state = ' ')
    {
        $this->redirectUrl = $redirectUrl;

        $query = new QueryString();
        $query->add('response_type','code');
        $query->add('client_id',$this->clientId);
        $query->add('redirect_uri',$redirectUrl);
        $query->add('state', $state);

        //$url = new Url('https','o2.mail.ru',null,null,null,'login',$query);
        $url = new Url('https','oauth.yandex.ru',null,null,null,'authorize', $query);
        return $url->__toString();
    }

    public function getToken($code,$redirectUrl)
    {
        $options = array(
            'auth' => array(
                $this->clientId,
                $this->secretKey
            )
        );
        $body = array(
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUrl
        );

        $url = 'https://oauth.yandex.ru/token';
        try {
            $response = $this->client->getClient()->post($url, null, $body, $options)->send();
        } catch(\Exception $e) {
             return $e->getMessage().$e->getCode().$e->getLine();
        }

        return $response->json();
    }

    public function refreshToken($refresh_token)
    {
        $options = array(
            'auth' => array(
                $this->clientId,
                $this->secretKey
            )
        );
        $body = array(
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientId,
            'refresh_token' => $refresh_token
        );

        $url = 'https://o2.mail.ru/token';
        try {
            $response = $this->client->getClient()->post($url, null, $body, $options)->send();
        } catch(\Exception $e) {
            return $e->getMessage().$e->getCode().$e->getLine();
        }

        /*$postBody = $response->getBody();*/
        return $response->json();
    }
} 