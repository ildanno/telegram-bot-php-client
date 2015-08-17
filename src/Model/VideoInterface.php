<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents a video file.
 *
 * @package Telegram\Bot\Client\Model
 */
interface VideoInterface
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
     * @return int
     */
    public function getDuration();

    /**
     * @return PhotoSizeInterface
     */
    public function getThumb();

    /**
     * @return string
     */
    public function getMimeType();

    /**
     * @return int
     */
    public function getFileSize();
}