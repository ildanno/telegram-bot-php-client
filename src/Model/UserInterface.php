<?php
namespace Telegram\Bot\Client\Model;

interface UserInterface
{
    /**
     * Unique identifier for this user or bot
     *
     * @return int
     */
    public function getId();

    /**
     * User‘s or bot’s first name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Optional. User‘s or bot’s last name
     *
     * @return string
     */
    public function getLastName();

    /**
     * Optional. User‘s or bot’s username
     *
     * @return string
     */
    public function getUsername();
}