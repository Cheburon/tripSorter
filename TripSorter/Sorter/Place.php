<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 5:55
 */

namespace TripSorter\Sorter;


use TripSorter\Mapper\Ticket;

class Place {

    /**
     * @var Ticket\AbstractBase
     */
    public $ticketIn = null;

    /**
     * @var Ticket\AbstractBase
     */
    public $ticketOut = null;

    /**
     * @var string
     */
    private $_name;

    /**
     * Place constructor.
     * @param string $name
     */
    public function __construct($name) {
        $this->_name = $name;
    }

    /**
     * @return string
     */
    public function name() {
        return $this->_name;
    }
}