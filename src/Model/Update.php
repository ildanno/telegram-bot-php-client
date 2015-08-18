<?php


namespace Telegram\Bot\Client\Model;


/**
 * This object represents an incoming update.
 *
 * @package Telegram\Bot\Client\Model
 */
class Update implements UpdateInterface
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates
     * or to restore the correct update sequence, should they get out of order.
     *
     * @var int
     */
    protected $update_id;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var MessageInterface[]
     */
    protected $message;

    /**
     * @return int
     */
    public function getUpdateId()
    {
        return $this->update_id;
    }

    /**
     * @param int $update_id
     * @return Update
     */
    public function setUpdateId($update_id)
    {
        $this->update_id = $update_id;
        return $this;
    }

    /**
     * @return MessageInterface[]
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param MessageInterface[] $message
     * @return Update
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }
}