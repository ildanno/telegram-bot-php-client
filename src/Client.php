<?php


namespace Telegram\Bot\Client;


use DateTime;
use Telegram\Bot\Client\Model\Message;
use Telegram\Bot\Client\Model\MessageInterface;
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

    /**
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param string $text Text of the message to be sent
     * @param array $options Array of optional values. Valid options are:
     * - bool disable_web_page_preview Disables link previews for links in this message
     * - int reply_to_message_id If the message is a reply, ID of the original message
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendMessage($chatId, $text, $options = [])
    {
        $request = new Request();
        $request->setUri($this->getEndpoint() . 'sendMessage');
        $request->setMethod(Request::METHOD_POST);

        $request->getPost()->set('chat_id', $chatId);
        $request->getPost()->set('text', $text);

        if (array_key_exists('disable_web_page_preview', $options)) {
            $request->getPost()->set('disable_web_page_preview', boolval($options['disable_web_page_preview']));
        }

        if (array_key_exists('reply_to_message_id', $options)) {
            $request->getPost()->set('reply_to_message_id', intval($options['reply_to_message_id']));
        }

        // TODO implement reply markup

        $client = $this->getHttpClient();
        $response = $client->send($request);

        $responseBody = json_decode($response->getBody());

        if (!$responseBody->ok) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody->result;

        $message = new Message();

        $message->setMessageId($result->message_id);
        $message->setDate((new DateTime())->setTimestamp($result->date));
        $message->setText($result->text);

        $user = new User();
        $user->setId($result->from->id);
        $user->setFirstName($result->from->first_name);

        if ($result->from->last_name) {
            $user->setLastName($result->from->last_name);
        }

        if ($result->from->username) {
            $user->setUsername($result->from->username);
        }

        $message->setFrom($user);

        return $message;
    }
}