<?php


namespace Telegram\Bot\Client\Hydrator;


use Telegram\Bot\Client\Hydrator\Strategy\MessageStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;

class UpdateHydrator extends ClassMethods
{
    /**
     * Define if extract values will use camel case or name with underscore
     * @param bool|array $underscoreSeparatedKeys
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);

        $this->addStrategy('message', new MessageStrategy());
    }

}