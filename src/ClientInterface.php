<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\UserInterface;

interface ClientInterface
{
    /**
     * @return UserInterface
     * @see https://core.telegram.org/bots/api#getme
     */
    public function getMe();

    /**
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param string $text Text of the message to be sent
     * @param array $options Array of optional values. Valid options are:
     * @internal bool disable_web_page_preview Disables link previews for links in this message
     * @internal int reply_to_message_id If the message is a reply, ID of the original message
     * @internal ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendMessage($chatId, $text, $options = []);
}
