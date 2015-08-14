<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Telegram\Bot\Client\Model\Audio;

class AudioStrategy extends AbstractClassMethodsStrategy
{

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    public function hydrate($value)
    {
        $audio = new Audio();
        $this->getHydrator()->hydrate($value, $audio);
        return $audio;
    }
}