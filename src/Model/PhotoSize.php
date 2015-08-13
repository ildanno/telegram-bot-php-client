<?php


namespace Telegram\Bot\Client\Model;


class PhotoSize implements PhotoSizeInterface
{
    /**
     * Unique identifier for this file
     *
     * @var string
     */
    protected $fileId;

    /**
     * Photo width
     *
     * @var int
     */
    protected $width;

    /**
     * Photo height
     *
     * @var int
     */
    protected $height;

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
     * @return PhotoSize
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
        return $this;
    }

    /**
     * Photo width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return PhotoSize
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Photo height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return PhotoSize
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
     * @return PhotoSize
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;
        return $this;
    }
}