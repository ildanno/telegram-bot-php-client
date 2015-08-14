<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\PhotoSize;
use Telegram\Bot\Client\Model\PhotoSizeInterface;

class PhotoSizeStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param array $value The original value.
     * @return PhotoSizeInterface Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $photoSize = new PhotoSize();
        $this->getHydrator()->hydrate($value, $photoSize);
        return $photoSize;
    }
}