<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\PhotoSize;

class PhotoArrayStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param array $value The original value.
     * @return PhotoSize[] Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $hydratedArray = [];

        foreach ($value as $photoData) {
            $photo = new PhotoSize();
            $this->getHydrator()->hydrate($photoData, $photo);
            $hydratedArray[] = $photo;
        }

        return $hydratedArray;
    }
}