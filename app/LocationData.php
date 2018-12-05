<?php
/**
 * Created by PhpStorm.
 * User: chazz
 * Date: 12/5/18
 * Time: 11:05 PM
 *
 */

namespace App;


class LocationData
{

    private $id;
    private $lat;
    private $lng;
    private $elevation;

    /**
     * LocationData constructor.
     *
     * @param $id
     * @param $lat
     * @param $lng
     * @param $elevation
     */
    public function __construct($id, $lat, $lng, $elevation)
    {
        $this->id        = $id;
        $this->lat       = $lat;
        $this->lng       = $lng;
        $this->elevation = $elevation;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return mixed
     */
    public function getElevation()
    {
        return $this->elevation;
    }
}
