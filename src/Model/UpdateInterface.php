<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents an incoming update.
 *
 * @package Telegram\Bot\Client\Model
 */
interface UpdateInterface
{
    /**
     * @return int
     */
    public function getUpdateId();

    /**
     * @return MessageInterface[]
     */
    public function getMessage();
}