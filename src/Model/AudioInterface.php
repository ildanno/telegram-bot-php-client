<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents an audio file (voice note).
 *
 * @package Telegram\Bot\Client\Model
 */
interface AudioInterface
{
    /**
     * Unique identifier for this file
     *
     * @return string
     */
    public function getFileId();

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @return int
     */
    public function getDuration();

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