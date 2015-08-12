<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use DateTime;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

class UnixTimeHydratorStrategy implements StrategyInterface
{

    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param DateTime $value The original value.
     * @return mixed Returns the value that should be extracted.
     * @internal param object $object (optional) The original object for context.
     */
    public function extract($value)
    {
        return $value->getTimestamp();
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     * @internal param array $data (optional) The original data for context.
     */
    public function hydrate($value)
    {
        return (new DateTime())->setTimestamp($value);
    }
}