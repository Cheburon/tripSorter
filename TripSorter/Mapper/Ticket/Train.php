<?php

namespace TripSorter\Mapper\Ticket;

class Train extends AbstractBase {

    /**
     * @var string
     */
    private $_seat;

    /**
     * @var string
     */
    private $_number;

    /**
     * Train constructor.
     * @param string $placeFrom
     * @param string $placeTo
     * @param string $number
     * @param string $seat
     */
    public function __construct($placeFrom, $placeTo, $number, $seat = null) {
        parent::__construct($placeFrom, $placeTo);
        $this->_number = $number;
        $this->_seat = $seat;
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
}