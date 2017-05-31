<?php

namespace TripSorter\Renderer;

use TripSorter\Mapper\Ticket;

abstract class AbstractBase {

    /**
     * @param Ticket\AbstractBase $ticket
     * @return string
     * @throws \Exception
     */
    abstract public function renderTicket(Ticket\AbstractBase $ticket);
}