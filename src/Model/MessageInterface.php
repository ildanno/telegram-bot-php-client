<?php
namespace Telegram\Bot\Client\Model;

use DateTime;

interface MessageInterface
{
    /**
     * Unique message identifier
     *
     * @return int
     */
    public function getMessageId();

    /**
     * Sender
     *
     * @return UserInterface
     */
    public function getFrom();

    /**
     * Date the message was sent in Unix time
     *
     * @return DateTime
     */
    public function getDate();

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @return GroupChatInterface|UserInterface
     */
    public function getChat();

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @return UserInterface
     */
    public function getForwardFrom();

    /**
     * Optional. For forwarded messages, date the original message was sent
     *
     * @return DateTime
     */
    public function getForwardDate();

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @return MessageInterface
     */
    public function getReplyToMessage();

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @return string
     */
    public function getText();

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @return AudioInterface
     */
    public function getAudio();

    /**
     * Optional. Message is a general file, information about the file
     *
     * @return DocumentInterface
     */
    public function getDocument();

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @return PhotoSizeInterface[]
     */
    public function getPhoto();

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @return StickerInterface
     */
    public function getSticker();

    /**
     * Optional. Message is a video, information about the video
     *
     * @return VideoInterface
     */
    public function getVideo();

    /**
     * Optional. Caption for the photo or video
     *
     * @return string
     */
    public function getCaption();

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @return ContactInterface
     */
    public function getContact();

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @return LocationInterface
     */
    public function getLocation();

    /**
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @return UserInterface
     */
    public function getNewChatParticipant();

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @return UserInterface
     */
    public function getLeftChatParticipant();

    /**
     * Optional. A group title was changed to this value
     *
     * @return string
     */
    public function getNewChatTitle();

    /**
     * Optional. A group photo was change to this value
     *
     * @return PhotoSizeInterface[]
     */
    public function getNewChatPhoto();

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @return boolean
     */
    public function isDeleteChatPhoto();

    /**
     * Optional. Informs that the group has been created
     *
     * @return boolean
     */
    public function isGroupChatCreated();
}