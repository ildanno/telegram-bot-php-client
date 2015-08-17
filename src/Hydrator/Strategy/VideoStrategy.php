<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\Video;
use Zend\Stdlib\Hydrator\ClassMethods;

class VideoStrategy extends AbstractClassMethodsStrategy
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

        $document = new Video();
        $hydrator->hydrate($value, $document);
        return $document;
    }
}