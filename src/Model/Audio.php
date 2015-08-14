<?php


namespace Telegram\Bot\Client\Model;


/**
 * This object represents an audio file (voice note).
 *
 * @package Telegram\Bot\Client\Model
 */
class Audio implements AudioInterface
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @var int
     */
    protected $duration;

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @var string
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int
     */
    protected $fileSize;

    /**
     * Unique identifier for this file
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Audio
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * Duration of the audio in seconds as defined by sender
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return Audio
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * Optional. MIME type of the file as defined by sender
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Audio
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Optional. File size
     *
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileSize
     * @return Audio
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}