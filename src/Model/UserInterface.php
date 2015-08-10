<?php
namespace Telegram\Bot\Client\Model;

interface UserInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return string
     */
    public function getUsername();
}