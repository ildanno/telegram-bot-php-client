<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Hydrator\MessageHydrator;
use Telegram\Bot\Client\Hydrator\Strategy\UnixTimeHydratorStrategy;
use Telegram\Bot\Client\Hydrator\Strategy\UserHydratorStrategy;
use Telegram\Bot\Client\Model\InputFileInterface;
use Telegram\Bot\Client\Model\Message;
use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\User;
use Telegram\Bot\Client\Model\UserInterface;
use Zend\Http\Client as ZendClient;
use Zend\Http\Request;
use Zend\Stdlib\Hydrator\ClassMethods;

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
     * A simple method for testing your bot's auth token. Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     *
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

        $responseBody = json_decode($response->getBody(), true);

        if (!$responseBody['ok']) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody['result'];

        $user = new User();

        $hydrator = new ClassMethods();
        $hydrator->hydrate($result, $user);

        return $user;
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param string $text Text of the message to be sent
     * @param array $options Array of optional values. Valid options are:
     * - bool disable_web_page_preview Disables link previews for links in this message
     * - int reply_to_message_id If the message is a reply, ID of the original message
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     * @throws \Exception
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

        $responseBody = json_decode($response->getBody(), true);

        if (!$responseBody['ok']) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody['result'];

        $message = new Message();

        $hydrator = new MessageHydrator();
        $hydrator->hydrate($result, $message);

        return $message;
    }

    /**
     * Use this method to forward messages of any kind. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param int $fromChatId Unique identifier for the chat where the original message was sent — User or GroupChat id
     * @param int $messageId Unique message identifier
     * @return MessageInterface
     * @throws \Exception
     * @see https://core.telegram.org/bots/api#forwardmessage
     */
    public function forwardMessage($chatId, $fromChatId, $messageId)
    {
        $request = new Request();
        $request->setUri($this->getEndpoint() . 'forwardMessage');
        $request->setMethod(Request::METHOD_POST);

        $request->getPost()->set('chat_id', $chatId);
        $request->getPost()->set('from_chat_id', $fromChatId);
        $request->getPost()->set('message_id', $messageId);

        $client = $this->getHttpClient();
        $response = $client->send($request);

        $responseBody = json_decode($response->getBody(), true);

        if (!$responseBody['ok']) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody['result'];

        $message = new Message();

        $hydrator = new MessageHydrator();
        $hydrator->hydrate($result, $message);

        return $message;
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param string|InputFileInterface $photo Photo to send. You can either pass a file_id as String to resend a photo that is already on the Telegram servers, or upload a new photo using multipart/form-data.
     * @param array $options Array of optional values. Valid options are:
     * - string caption Photo caption (may also be used when resending photos by file_id).
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     * @throws \Exception
     */
    public function sendPhoto($chatId, $photo, $options = [])
    {
        $request = new Request();
        $request->setUri($this->getEndpoint() . 'sendPhoto');
        $request->setMethod(Request::METHOD_POST);

        $request->getPost()->set('chat_id', $chatId);
        $request->getPost()->set('photo', $photo);

        if (array_key_exists('caption', $options)) {
            $request->getPost()->set('caption', $options['caption']);
        }

        if (array_key_exists('reply_to_message_id', $options)) {
            $request->getPost()->set('reply_to_message_id', intval($options['reply_to_message_id']));
        }

        // TODO implement reply markup

        $client = $this->getHttpClient();
        $response = $client->send($request);

        $responseBody = json_decode($response->getBody(), true);

        if (!$responseBody['ok']) {
            throw new \Exception('Failed retrieving data: ' . json_encode($responseBody));
        }

        $result = $responseBody['result'];

        $message = new Message();

        $hydrator = new MessageHydrator();
        $hydrator->hydrate($result, $message);

        return $message;
    }
}