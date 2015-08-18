<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represent a user's profile pictures.
 *
 * @package Telegram\Bot\Client\Model
 */
interface UserProfilePhotosInterface
{
    /**
     * @return int
     */
    public function getTotalCount();

    /**
     * @return PhotoSizeInterface[][]
     */
    public function getPhotos();
}