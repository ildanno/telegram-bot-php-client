<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents a general file (as opposed to photos and audio files).
 *
 * @package Telegram\Bot\Client\Model
 */
interface DocumentInterface
{
    /**
     * Unique file identifier
     *
     * @return string
     */
    public function getFileId();

    /**
     * Optional. Document thumbnail as defined by sender
     *
     * @return PhotoSizeInterface
     */
    public function getThumb();

    /**
     * Optional. Original filename as defined by sender
     *
     * @return string
     */
    public function getFileName();

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @return string
     */
    public function getMimeType();

    /**
     * Optional. File size
     *
     * @return int
     */
    public function getFileSize();
}