<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Model\UserInterface;

interface ClientInterface
{
    /**
     * @return UserInterface
     * @see https://core.telegram.org/bots/api#getme
     */
    public function getMe();
}