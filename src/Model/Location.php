<?php


namespace Telegram\Bot\Client\Model;


/**
 * This object represents a point on the map.
 *
 * @package Telegram\Bot\Client\Model
 */
class Location implements LocationInterface
{
    /**
     * Longitude as defined by sender
     * @var float
     */
    protected $longitude;

    /**
     * Latitude as defined by sender
     * @var float
     */
    protected $latitude;

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     * @return Location
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     * @return Location
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }
}