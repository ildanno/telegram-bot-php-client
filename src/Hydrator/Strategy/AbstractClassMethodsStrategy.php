<?php


namespace Telegram\Bot\Client\Hydrator\Strategy;


use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\HydratorAwareInterface;
use Zend\Stdlib\Hydrator\HydratorAwareTrait;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

abstract class AbstractClassMethodsStrategy implements StrategyInterface, HydratorAwareInterface
{
    use HydratorAwareTrait;

    /**
     * Retrieve hydrator
     *
     * @param void
     * @return null|HydratorInterface
     * @access public
     */
    public function getHydrator()
    {
        if (!$this->hydrator) {
            $this->setHydrator(new ClassMethods());
        }

        return $this->hydrator;
    }

    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be extracted.
     */
    public function extract($value)
    {
        return $this->getHydrator()->extract($value);
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     */
    abstract public function hydrate($value);
}