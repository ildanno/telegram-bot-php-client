<?php
namespace Telegram\Bot\Client\Model;

interface PhotoSizeInterface
{
    /**
     * Unique identifier for this file
     *
     * @return string
     */
    public function getFileId();

    /**
     * Photo width
     *
     * @return int
     */
    public function getWidth();

    /**
     * Photo height
     *
     * @return int
     */
    public function getHeight();

    /**
     * Optional. File size
     *
     * @return int
     */
    public function getFileSize();
}