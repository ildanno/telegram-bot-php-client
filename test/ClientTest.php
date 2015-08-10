<?php


namespace TelegramTest\Bot\Client;


use Prophecy\Argument;
use Prophecy\Prophecy\MethodProphecy;
use Telegram\Bot\Client\Client;
use Telegram\Bot\Client\ClientInterface;
use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\UserInterface;
use Zend\Http\Client as HttpClient;
use Zend\Http\Response;

date_default_timezone_set('Europe/Rome');

class ClientTest extends \PHPUnit_Framework_TestCase
{

    public function testInterface()
    {
        $client = new Client();
        $this->assertTrue($client instanceof ClientInterface);
    }

    public function testGetMe()
    {
        /** @var HttpClient $httpClient */
        $httpClient = $this->prophesize('Zend\Http\Client');

        $botClient = new Client();
        $botClient->setHttpClient($httpClient->reveal());

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(json_encode([
            'ok' => true,
            'result' => [
                'id' => 123,
                'first_name' => 'Alf',
                'last_name' => 'Bond',
                'username' => 'charlee',
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $bot = $botClient->getMe();

        $this->assertTrue($bot instanceof UserInterface);

        $this->assertEquals(123, $bot->getId());
        $this->assertEquals('Alf', $bot->getFirstName());
        $this->assertEquals('Bond', $bot->getLastName());
        $this->assertEquals('charlee', $bot->getUsername());
    }

    public function testSendMessage()
    {
        /** @var HttpClient $httpClient */
        $httpClient = $this->prophesize('Zend\Http\Client');

        $botClient = new Client();
        $botClient->setHttpClient($httpClient->reveal());

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(json_encode([
            'ok' => true,
            'result' => [
                'message_id' => 1410,
                'from' => [
                    'id' => 506,
                    'first_name' => 'TestinBot',
                    'username' => 'TestingBot'
                ],
                'chat' => [
                    'id' => 31051985,
                    'first_name' => 'Awesome',
                    'last_name' => 'Developer',
                    'username' => 'somecoolness'
                ],
                'date' => 1439219709,
                'text' => 'My message'
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendMessage(31051985, 'My message');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(1410, $message->getMessageId());
        $this->assertEquals(506, $message->getFrom()->getId());
        $this->assertEquals(1439219709, $message->getDate()->getTimestamp());
        $this->assertEquals('My message', $message->getText());
    }
}
