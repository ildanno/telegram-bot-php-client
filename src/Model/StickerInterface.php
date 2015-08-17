<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents a sticker.
 *
 * @package Telegram\Bot\Client\Model
 */
interface StickerInterface
{
    /**
     * @return string
     */
    public function getFileId();

    /**
     * @return int
     */
    public function getWidth();

    /**
     * @return int
     */
    public function getHeight();

    /**
     * @return PhotoSizeInterface
     */
    public function getThumb();

    /**
     * @return int
     */
    public function getFileSize();
}