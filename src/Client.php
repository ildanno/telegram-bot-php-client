<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Model\User;
use Telegram\Bot\Client\Model\UserInterface;
use Zend\Http\Client as ZendClient;
use Zend\Http\Request;

class Client implements ClientInterface
{
    /**
     * @var ZendClient
     */
    protected $httpClient;

    protected $endpoint;

    /**
     * @return ZendClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param ZendClient $httpClient
     * @return Client
     */
    public function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param string $endpoint
     * @return Client
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    /**
     * @return UserInterface
     * @throws \Exception
     * @see https://core.telegram.org/bots/api#getme
     */
    public function getMe()
    {
        $request = new Request();
        $request->setUri($this->getEndpoint() . 'getMe');
        $request->setMethod(Request::METHOD_GET);

        $client = $this->getHttpClient();
        $response = $client->send($request);

        $responseBody = json_decode($response->getBody());

        if (!$responseBody->ok) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody->result;

        $user = new User();
        $user->setId($result->id);
        $user->setFirstName($result->first_name);

        if ($result->last_name) {
            $user->setLastName($result->last_name);
        }

        if ($result->username) {
            $user->setUsername($result->username);
        }

        return $user;
    }
}