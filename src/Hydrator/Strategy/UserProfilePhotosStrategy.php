<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\PhotoSize;

class UserProfilePhotosStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $hydratedArray = [];

        foreach ($value as $profilePic) {
            $profilePicArray = [];
            foreach ($profilePic as $photoSize) {
                $photo = new PhotoSize();
                $this->getHydrator()->hydrate($photoSize, $photo);
                $profilePicArray[] = $photo;
            }
            $hydratedArray[] = $profilePicArray;
        }

        return $hydratedArray;
    }
}