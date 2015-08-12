<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\UserInterface;

interface ClientInterface
{
    /**
     * A simple method for testing your bot's auth token. Requires no parameters.
     * Returns basic information about the bot in form of a User object.
     *
     * @return UserInterface
     * @see https://core.telegram.org/bots/api#getme
     */
    public function getMe();

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
     * @see https://core.telegram.org/bots/api#sendmessage
     */
    public function sendMessage($chatId, $text, $options = []);

    /**
     * Use this method to forward messages of any kind. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param int $fromChatId Unique identifier for the chat where the original message was sent — User or GroupChat id
     * @param int $messageId Unique message identifier
     * @return MessageInterface
     * @see https://core.telegram.org/bots/api#forwardmessage
     */
    public function forwardMessage($chatId, $fromChatId, $messageId);
}
