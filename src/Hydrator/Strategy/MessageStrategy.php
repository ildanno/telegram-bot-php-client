<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Hydrator\MessageHydrator;
use Telegram\Bot\Client\Model\Message;

class MessageStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $message = new Message();
        $hydrator = new MessageHydrator();
        $hydrator->hydrate($value, $message);
        return $message;
    }
}