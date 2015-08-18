<?php


namespace Telegram\Bot\Client\Model;


/**
 * This object represent a user's profile pictures.
 *
 * @package Telegram\Bot\Client\Model
 */
class UserProfilePhotos implements UserProfilePhotosInterface
{
    /**
     * Total number of profile pictures the target user has
     *
     * @var int
     */
    protected $total_count;

    /**
     * Requested profile pictures (in up to 4 sizes each)
     *
     * @var PhotoSizeInterface[][]
     */
    protected $photos;

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     * @return UserProfilePhotos
     */
    public function setTotalCount($total_count)
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return PhotoSizeInterface[][]
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param PhotoSizeInterface[][] $photos
     * @return UserProfilePhotos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
        return $this;
    }
}