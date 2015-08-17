<?php


namespace TelegramTest\Bot\Client;


use Prophecy\Argument;
use Prophecy\Prophecy\MethodProphecy;
use Telegram\Bot\Client\Client;
use Telegram\Bot\Client\ClientInterface;
use Telegram\Bot\Client\Model\AudioInterface;
use Telegram\Bot\Client\Model\DocumentInterface;
use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\PhotoSizeInterface;
use Telegram\Bot\Client\Model\StickerInterface;
use Telegram\Bot\Client\Model\UserInterface;
use Telegram\Bot\Client\Model\VideoInterface;
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

    public function testForwardMessage()
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
                'message_id' => 1411,
                'from' => [
                    'id' => 516,
                    'first_name' => 'AbotherTestingBot',
                    'username' => 'AbotherTestingBot'
                ],
                'chat' => [
                    'id' => 31054985,
                    'first_name' => 'Same Awesome',
                    'last_name' => 'Developer',
                    'username' => 'morecoolness'
                ],
                'date' => 1439219731,
                'forward_from' => [
                    'id' => 506,
                    'first_name' => 'TestinBot',
                    'username' => 'TestingBot'
                ],
                'forward_date' => 1439219709,
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->forwardMessage(31054985, 506, 1410);

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(1411, $message->getMessageId());
        $this->assertEquals(516, $message->getFrom()->getId());
        $this->assertEquals(1439219731, $message->getDate()->getTimestamp());
        $this->assertEquals(506, $message->getForwardFrom()->getId());
        $this->assertEquals(1439219709, $message->getForwardDate()->getTimestamp());
    }

    public function testSendPhoto()
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
                'message_id' => 12,
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
                'date' => 1439395291,
                'photo' => [
                    [
                        'file_id' => '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 493,
                        'width' => 90,
                        'height' => 23
                    ],
                    [
                        'file_id' => '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 4727,
                        'width' => 320,
                        'height' => 82
                    ],
                    [
                        'file_id' => '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 23133,
                        'width' => 800,
                        'height' => 204
                    ],
                    [
                        'file_id' => '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 42933,
                        'width' => 1280,
                        'height' => 327
                    ],
                    [
                        'file_id' => '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 44311,
                        'width' => 1596,
                        'height' => 408
                    ]
                ]
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendPhoto(31051985, '4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(31051985, $message->getChat()->getId());
        $this->assertNotCount(0, $message->getPhoto());

        foreach ($message->getPhoto() as $photoSize) {
            $this->assertTrue($photoSize instanceof PhotoSizeInterface);
            $this->assertEquals('4u4DB44DXKuxuxfNrwRSs3yKnCjH6-xw4f44BPflJkD3im73bNY44uI', $photoSize->getFileId());
        }
    }

    public function testSendAudio()
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
                'message_id' => 16,
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
                'date' => 1439556594,
                'audio' => [
                    'duration' => 2,
                    'mime_type' => 'audio/mpeg',
                    'file_id' => 'AwADAABDGgADFM2vBF_fTf7Hsi4XAg',
                    'file_size' => 13534
                ]
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendAudio(31051985, 'AwADAABDGgADFM2vBF_fTf7Hsi4XAg');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(31051985, $message->getChat()->getId());
        $this->assertTrue($message->getAudio() instanceof AudioInterface);

        $this->assertEquals('AwADAABDGgADFM2vBF_fTf7Hsi4XAg', $message->getAudio()->getFileId());
    }

    public function testSendDocument()
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
                'message_id' => 16,
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
                'date' => 1439556594,
                'document' => [
                    'file_id' => 'AwADAABDGgADFM2vBF_fTf7Hsi4XAg',
                    'thumb' => [
                        'file_id' => 'AwADAABDGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 493,
                        'width' => 90,
                        'height' => 23
                    ],
                    'file_name' => 'ok.pdf',
                    'mime_type' => 'application/x-pdf',
                    'file_size' => 13534
                ]
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendDocument(31051985, 'AwADAABDGgADFM2vBF_fTf7Hsi4XAg');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(31051985, $message->getChat()->getId());
        $this->assertTrue($message->getDocument() instanceof DocumentInterface);

        $this->assertEquals('AwADAABDGgADFM2vBF_fTf7Hsi4XAg', $message->getDocument()->getFileId());
        $this->assertEquals('AwADAABDGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI', $message->getDocument()->getThumb()->getFileId());
    }

    public function testSendSticker()
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
                'message_id' => 16,
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
                'date' => 1439556594,
                'sticker' => [
                    'file_id' => 'AwADADABGgADFM2vBF_fTf7Hsi4XAg',
                    'width' => 390,
                    'height' => 423,
                    'thumb' => [
                        'file_id' => 'AwADADABGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 493,
                        'width' => 90,
                        'height' => 23,
                    ],
                    'file_size' => 17534,
                ]
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendSticker(31051985, 'AwADADABGgADFM2vBF_fTf7Hsi4XAg');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(31051985, $message->getChat()->getId());
        $this->assertTrue($message->getSticker() instanceof StickerInterface);

        $this->assertEquals('AwADADABGgADFM2vBF_fTf7Hsi4XAg', $message->getSticker()->getFileId());
        $this->assertEquals('AwADADABGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI', $message->getSticker()->getThumb()->getFileId());
    }

    public function testSendVideo()
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
                'message_id' => 16,
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
                'date' => 1439556594,
                'video' => [
                    'file_id' => 'AwADADABGgADFM2vBF_fTf7Hsi4XAg',
                    'width' => 390,
                    'height' => 423,
                    'thumb' => [
                        'file_id' => 'AwADADABGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI',
                        'file_size' => 493,
                        'width' => 90,
                        'height' => 23,
                    ],
                    'file_size' => 17534,
                    'duration' => 2,
                    'mime_type' => 'video/mpeg4',
                ]
            ]
        ]));

        /** @var MethodProphecy $m */
        $m = $httpClient->send(Argument::any());
        $m->shouldBeCalled()->willReturn($response);

        $message = $botClient->sendVideo(31051985, 'AwADADABGgADFM2vBF_fTf7Hsi4XAg');

        $this->assertTrue($message instanceof MessageInterface);

        $this->assertEquals(31051985, $message->getChat()->getId());
        $this->assertTrue($message->getVideo() instanceof VideoInterface);

        $this->assertEquals('AwADADABGgADFM2vBF_fTf7Hsi4XAg', $message->getVideo()->getFileId());
        $this->assertEquals('AwADADABGgADFM2vBF_fTf7Hsi4XAg-xw4f44BPflJkD3im73bNY44uI', $message->getVideo()->getThumb()->getFileId());
    }
}
