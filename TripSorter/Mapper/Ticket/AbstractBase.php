<?php

namespace TripSorter\Mapper\Ticket;

abstract class AbstractBase {

    /**
     * @var string
     */
    private $_placeFrom;

    /**
     * @var string
     */
    private $_placeTo;

    public function __construct($placeFrom, $placeTo) {
        $this->_placeFrom = $placeFrom;
        $this->_placeTo = $placeTo;
    }

    /**
     * @return string
     */
    public function placeFrom() {
        return $this->_placeFrom;
    }

    /**
     * @return string
     */
    public function placeTo() {
        return $this->_placeTo;
    }
}