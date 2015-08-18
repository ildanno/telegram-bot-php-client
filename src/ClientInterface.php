<?php


namespace Telegram\Bot\Client;


use Telegram\Bot\Client\Model\InputFileInterface;
use Telegram\Bot\Client\Model\MessageInterface;
use Telegram\Bot\Client\Model\UpdateInterface;
use Telegram\Bot\Client\Model\UserInterface;
use Telegram\Bot\Client\Model\UserProfilePhotosInterface;

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
     */
    public function sendPhoto($chatId, $photo, $options = []);

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message.
     * For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Document).
     * On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param InputFileInterface|string $audio Audio file to send. You can either pass a file_id as String to resend an audio that is already on the Telegram servers, or upload a new audio file using multipart/form-data.
     * @param array $options Array of optional values. Valid options are:
     * - int duration Duration of sent audio in seconds.
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendAudio($chatId, $audio, $options = []);

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param InputFileInterface|string $document File to send. You can either pass a file_id as String to resend a file that is already on the Telegram servers, or upload a new file using multipart/form-data.
     * @param array $options Array of optional values. Valid options are:
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendDocument($chatId, $document, $options = []);

    /**
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param InputFileInterface|string $sticker Sticker to send. You can either pass a file_id as String to resend a sticker that is already on the Telegram servers, or upload a new sticker using multipart/form-data.
     * @param array $options Array of optional values. Valid options are:
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendSticker($chatId, $sticker, $options = []);

    /**
     * Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document).
     * On success, the sent Message is returned.
     * Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param InputFileInterface|string $video Video to send. You can either pass a file_id as String to resend a video that is already on the Telegram servers, or upload a new video file using multipart/form-data.
     * @param array $options Array of optional values. Valid options are:
     * - int duration Duration of sent video in seconds.
     * - string caption Video caption (may also be used when resending videos by file_id).
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendVideo($chatId, $video, $options = []);

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param float $latitude Latitude of location
     * @param float $longitude Longitude of location
     * @param array $options Array of optional values. Valid options are:
     * - int reply_to_message_id If the message is a reply, ID of the original message.
     * - ReplyKeyboardMarkup|ReplyKeyboardHide|ForceReply reply_markup Additional interface options. A JSON-serialized object for a custom reply keyboard, instructions to hide keyboard or to force a reply from the user.
     * @return MessageInterface
     */
    public function sendLocation($chatId, $latitude, $longitude, $options = []);

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status).
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     *
     * @param int $chatId Unique identifier for the message recipient — User or GroupChat id
     * @param string $action Type of action to broadcast. Choose one, depending on what the user is about to receive:
     * - 'typing' for text messages
     * - 'upload_photo' for photos
     * - 'record_video' or 'upload_video' for videos
     * - 'record_audio' or 'upload_audio' for audio files
     * - 'upload_document' for general files
     * - 'find_location' for location data
     * @return bool
     */
    public function sendChatAction($chatId, $action);

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     *
     * @param int $userId Unique identifier of the target user
     * @param int $offset Sequential number of the first photo to be returned. By default, all photos are returned.
     * @param int $limit Limits the number of photos to be retrieved. Values between 1—100 are accepted. Defaults to 100.
     * @return UserProfilePhotosInterface
     */
    public function getUserProfilePhotos($userId, $offset = null, $limit = 100);

    /**
     * Use this method to receive incoming updates using long polling. An Array of Update objects is returned.
     *
     * @param array $options Array of optional values. Valid options are:
     * - int offset Identifier of the first update to be returned. Must be greater by one than the highest among the identifiers of previously received updates. By default, updates starting with the earliest unconfirmed update are returned. An update is considered confirmed as soon as getUpdates is called with an offset higher than its update_id.
     * - int limit Limits the number of updates to be retrieved. Values between 1—100 are accepted. Defaults to 100
     * - int timeout Timeout in seconds for long polling. Defaults to 0, i.e. usual short polling
     * @return UpdateInterface[]
     */
    public function getUpdates($options = []);
}
