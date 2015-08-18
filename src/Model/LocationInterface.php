<?php
namespace Telegram\Bot\Client\Model;


/**
 * This object represents a point on the map.
 *
 * @package Telegram\Bot\Client\Model
 */
interface LocationInterface
{
    /**
     * @return float
     */
    public function getLongitude();

    /**
     * @return float
     */
    public function getLatitude();
}