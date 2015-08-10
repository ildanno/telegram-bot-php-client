<?php


namespace Telegram\Bot\Client\Model;


use DateTime;

class Message implements MessageInterface
{
    /**
     * @var int
     */
    protected $messageId;

    /**
     * @var UserInterface
     */
    protected $from;

    /**
     * @var DateTime
     */
    protected $date;

    /**
     * @var UserInterface|GroupChatInterface
     */
    protected $chat;

    /**
     * @var UserInterface
     */
    protected $forwardFrom;

    /**
     * @var DateTime
     */
    protected $forwardDate;

    /**
     * @var MessageInterface
     */
    protected $replyToMessage;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var AudioInterface
     */
    protected $audio;

    /**
     * @var DocumentInterface
     */
    protected $document;

    /**
     * @var PhotoSizeInterface[]
     */
    protected $photo;

    /**
     * @var StickerInterface
     */
    protected $sticker;

    /**
     * @var VideoInterface
     */
    protected $video;

    /**
     * @var string
     */
    protected $caption;

    /**
     * @var ContactInterface
     */
    protected $contact;

    /**
     * @var LocationInterface
     */
    protected $location;

    /**
     * @var UserInterface
     */
    protected $newChatParticipant;

    /**
     * @var UserInterface
     */
    protected $leftChatParticipant;

    /**
     * @var string
     */
    protected $newChatTitle;

    /**
     * @var PhotoSizeInterface[]
     */
    protected $newChatPhoto;

    /**
     * @var bool
     */
    protected $deleteChatPhoto;

    /**
     * @var bool
     */
    protected $groupChatCreated;

    /**
     * Unique message identifier
     *
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return MessageInterface
     */
    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * Sender
     *
     * @return UserInterface
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param UserInterface $from
     * @return MessageInterface
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * Date the message was sent in Unix time
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return MessageInterface
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @return GroupChatInterface|UserInterface
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param GroupChatInterface|UserInterface $chat
     * @return MessageInterface
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
        return $this;
    }

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @return UserInterface
     */
    public function getForwardFrom()
    {
        return $this->forwardFrom;
    }

    /**
     * @param UserInterface $forwardFrom
     * @return MessageInterface
     */
    public function setForwardFrom($forwardFrom)
    {
        $this->forwardFrom = $forwardFrom;
        return $this;
    }

    /**
     * Optional. For forwarded messages, date the original message was sent
     *
     * @return DateTime
     */
    public function getForwardDate()
    {
        return $this->forwardDate;
    }

    /**
     * @param DateTime $forwardDate
     * @return MessageInterface
     */
    public function setForwardDate($forwardDate)
    {
        $this->forwardDate = $forwardDate;
        return $this;
    }

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     *
     * @return MessageInterface
     */
    public function getReplyToMessage()
    {
        return $this->replyToMessage;
    }

    /**
     * @param MessageInterface $replyToMessage
     * @return MessageInterface
     */
    public function setReplyToMessage($replyToMessage)
    {
        $this->replyToMessage = $replyToMessage;
        return $this;
    }

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return MessageInterface
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @return AudioInterface
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param AudioInterface $audio
     * @return MessageInterface
     */
    public function setAudio($audio)
    {
        $this->audio = $audio;
        return $this;
    }

    /**
     * Optional. Message is a general file, information about the file
     *
     * @return DocumentInterface
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param DocumentInterface $document
     * @return MessageInterface
     */
    public function setDocument($document)
    {
        $this->document = $document;
        return $this;
    }

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @return PhotoSizeInterface[]
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param PhotoSizeInterface[] $photo
     * @return MessageInterface
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @return StickerInterface
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param StickerInterface $sticker
     * @return MessageInterface
     */
    public function setSticker($sticker)
    {
        $this->sticker = $sticker;
        return $this;
    }

    /**
     * Optional. Message is a video, information about the video
     *
     * @return VideoInterface
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     *
     * @param VideoInterface $video
     * @return MessageInterface
     */
    public function setVideo($video)
    {
        $this->video = $video;
        return $this;
    }

    /**
     * Optional. Caption for the photo or video
     *
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return MessageInterface
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @return ContactInterface
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param ContactInterface $contact
     * @return MessageInterface
     */
    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @return LocationInterface
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param LocationInterface $location
     * @return MessageInterface
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @return UserInterface
     */
    public function getNewChatParticipant()
    {
        return $this->newChatParticipant;
    }

    /**
     * @param UserInterface $newChatParticipant
     * @return MessageInterface
     */
    public function setNewChatParticipant($newChatParticipant)
    {
        $this->newChatParticipant = $newChatParticipant;
        return $this;
    }

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @return UserInterface
     */
    public function getLeftChatParticipant()
    {
        return $this->leftChatParticipant;
    }

    /**
     * @param UserInterface $leftChatParticipant
     * @return MessageInterface
     */
    public function setLeftChatParticipant($leftChatParticipant)
    {
        $this->leftChatParticipant = $leftChatParticipant;
        return $this;
    }

    /**
     * Optional. A group title was changed to this value
     *
     * @return string
     */
    public function getNewChatTitle()
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     * @return MessageInterface
     */
    public function setNewChatTitle($newChatTitle)
    {
        $this->newChatTitle = $newChatTitle;
        return $this;
    }

    /**
     * Optional. A group photo was change to this value
     *
     * @return PhotoSizeInterface[]
     */
    public function getNewChatPhoto()
    {
        return $this->newChatPhoto;
    }

    /**
     * @param PhotoSizeInterface[] $newChatPhoto
     * @return MessageInterface
     */
    public function setNewChatPhoto($newChatPhoto)
    {
        $this->newChatPhoto = $newChatPhoto;
        return $this;
    }

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @return boolean
     */
    public function isDeleteChatPhoto()
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param boolean $deleteChatPhoto
     * @return MessageInterface
     */
    public function setDeleteChatPhoto($deleteChatPhoto)
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
        return $this;
    }

    /**
     * Optional. Informs that the group has been created
     *
     * @return boolean
     */
    public function isGroupChatCreated()
    {
        return $this->groupChatCreated;
    }

    /**
     * @param boolean $groupChatCreated
     * @return MessageInterface
     */
    public function setGroupChatCreated($groupChatCreated)
    {
        $this->groupChatCreated = $groupChatCreated;
        return $this;
    }


}