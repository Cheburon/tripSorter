<?php

namespace TripSorter\Mapper\Ticket;

class Air extends AbstractBase {

    /**
     * @var string
     */
    private $_flightNumber;

    /**
     * @var string
     */
    private $_seat;

    /**
     * @var string
     */
    private $_gate;

    /**
     * @var string
     */
    private $_baggageDropNumber;

    /**
     * @var bool
     */
    private $_isBaggageDropAutoTransfer;

    /**
     * Air constructor.
     * @param string $placeFrom
     * @param string $placeTo
     * @param string $flightNumber
     * @param string $seat
     * @param string $gate
     * @param string $baggageDropNumber
     * @param bool $isBaggageDropAutoTransfer
     */
    public function __construct($placeFrom, $placeTo, $flightNumber, $seat, $gate, $baggageDropNumber = null, $isBaggageDropAutoTransfer = null) {
        parent::__construct($placeFrom, $placeTo);
        $this->_flightNumber = $flightNumber;
        $this->_baggageDropNumber = $baggageDropNumber;
        $this->_isBaggageDropAutoTransfer = $isBaggageDropAutoTransfer;
        $this->_seat = $seat;
        $this->_gate = $gate;
    }

    /**
     * @return string
     */
    public function flightNumber() {
        return $this->_flightNumber;
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
    public function gate() {
        return $this->_gate;
    }

    /**
     * @return string
     */
    public function baggageDropNumber() {
        return $this->_baggageDropNumber;
    }

    /**
     * @return bool
     */
    public function isBaggageDropAutoTransfer() {
        return $this->_isBaggageDropAutoTransfer;
    }
}