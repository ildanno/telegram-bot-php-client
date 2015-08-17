<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\Sticker;
use Zend\Stdlib\Hydrator\ClassMethods;

class StickerStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        /** @var ClassMethods $hydrator */
        $hydrator = $this->getHydrator();
        $hydrator->addStrategy('thumb', new PhotoSizeStrategy());

        $sticker = new Sticker();
        $hydrator->hydrate($value, $sticker);
        return $sticker;
    }
}