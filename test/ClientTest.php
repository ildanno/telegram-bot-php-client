<?php


namespace TelegramTest\Bot\Client;


use Prophecy\Prophecy\MethodProphecy;
use Telegram\Bot\Client\Client;
use Telegram\Bot\Client\ClientInterface;
use Telegram\Bot\Client\Model\UserInterface;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request;
use Zend\Http\Response;

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

        $request = new Request();
        $request->setUri('getMe');
        $request->setMethod(Request::METHOD_GET);

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
        $m = $httpClient->send($request);
        $m->shouldBeCalled()->willReturn($response);

        $bot = $botClient->getMe();

        $this->assertTrue($bot instanceof UserInterface);

        $this->assertEquals(123, $bot->getId());
        $this->assertEquals('Alf', $bot->getFirstName());
        $this->assertEquals('Bond', $bot->getLastName());
        $this->assertEquals('charlee', $bot->getUsername());
    }
}
