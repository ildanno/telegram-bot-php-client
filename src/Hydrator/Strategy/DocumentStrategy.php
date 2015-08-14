<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\Document;
use Telegram\Bot\Client\Model\DocumentInterface;
use Zend\Stdlib\Hydrator\ClassMethods;

class DocumentStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param array $value The original value.
     * @return DocumentInterface Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        /** @var ClassMethods $hydrator */
        $hydrator = $this->getHydrator();
        $hydrator->addStrategy('thumb', new PhotoSizeStrategy());

        $document = new Document();
        $hydrator->hydrate($value, $document);
        return $document;
    }
}