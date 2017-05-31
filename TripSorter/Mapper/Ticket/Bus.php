<?php

namespace TripSorter\Mapper\Ticket;

class Bus extends AbstractBase {

    /**
     * @var string
     */
    private $_seat;

    /**
     * @var string
     */
    private $_number;

    /**
     * @var string
     */
    private $_destination;

    /**
     * Bus constructor.
     * @param string $placeFrom
     * @param string $placeTo
     * @param string $number
     * @param string $seat
     * @param string $destination
     */
    public function __construct($placeFrom, $placeTo, $number = null, $seat = null, $destination = null) {
        parent::__construct($placeFrom, $placeTo);
        $this->_number = $number;
        $this->_seat = $seat;
        $this->_destination = $destination;
    }

    /**
     * @return string
     */
    public function number() {
        return $this->_number;
    }

    /**
     * @return string
     */
    public function seat() {
        return $this->_seat;
    }

    /**
     * @return string
     */
    public function destination() {
        return $this->_destination;
    }
}