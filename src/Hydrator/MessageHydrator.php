<?php


namespace Telegram\Bot\Client\Hydrator;


use Telegram\Bot\Client\Hydrator\Strategy\PhotoArrayStrategy;
use Telegram\Bot\Client\Hydrator\Strategy\UnixTimeHydratorStrategy;
use Telegram\Bot\Client\Hydrator\Strategy\UserHydratorStrategy;
use Zend\Stdlib\Hydrator\ClassMethods;

class MessageHydrator extends ClassMethods
{
    /**
     * Define if extract values will use camel case or name with underscore
     * @param bool|array $underscoreSeparatedKeys
     */
    public function __construct($underscoreSeparatedKeys = true)
    {
        parent::__construct($underscoreSeparatedKeys);

        $this->addStrategy('from', new UserHydratorStrategy());
        $this->addStrategy('chat', new UserHydratorStrategy()); // TODO group chat
        $this->addStrategy('date', new UnixTimeHydratorStrategy());
        $this->addStrategy('forward_from', new UserHydratorStrategy());
        $this->addStrategy('forward_date', new UnixTimeHydratorStrategy());
        $this->addStrategy('photo', new PhotoArrayStrategy());
    }

}