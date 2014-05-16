# Yandex Metrica api for PHP

A PHP library for interacting with the Yandex Metrica REST API v2.

[Документация](http://api.yandex.ru/metrika/doc/ref/concepts/About.xml)

## Usage

```php

require "vendor/autoload.php";

$clientId = 'client_id';
$secret_pass = 'secret_pass';
$redirectUrl ='http://mysite.com';

$api = new YaM\Api($clientId, $secret_pass);

/**
 * Возвращает Url который нужен для запроса к yandex metrica, для создания кода авторизации
 */
$url = $api->getOAuth()->getLoginUrl($redirectUrl);

/**
 * Теперь каким либо магическим образов с урл на которого редиректил нас mail,
 * мы получили код авторизации
 */
$code = '123456789';

/**
 * По коду авторизации, и url, на который мы были переадресованы, мы получаем токены доступа,
 * Внимание, код авторизации действует только 1 раз при повторном вызове запроса с тем же кодом доступа
 * мы не сможем получить токены.
 */
$accessData = $api->getOauth()->getToken($code, $redirectUrl);

$access_token = $accessData['access_token'];

$api->setTokenAccess($access_token);

/**
 * @var \YaM\Api\Counter $counter
 */
$counter = $api->getContainer('counters');

var_dump($counter->getCounter('1234567'));

```
