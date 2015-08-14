<?php


namespace Telegram\Bot\Client\Model;


/**
 * This object represents a general file (as opposed to photos and audio files).
 *
 * @package Telegram\Bot\Client\Model
 */
class Document implements DocumentInterface
{
    /**
     * Unique file identifier
     *
     * @var string
     */
    protected $fileId;

    /**
     * Optional. Document thumbnail as defined by sender
     *
     * @var PhotoSizeInterface
     */
    protected $thumb;

    /**
     * Optional. Original filename as defined by sender
     *
     * @var string
     */
    protected $fileName;

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
     * Unique file identifier
     *
     * @return string
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * @param string $fileId
     * @return Document
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * Optional. Document thumbnail as defined by sender
     *
     * @return PhotoSizeInterface
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSizeInterface $thumb
     * @return Document
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * Optional. Original filename as defined by sender
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Document
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
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
     * @return Document
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
     * @return Document
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}