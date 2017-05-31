<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 5:39
 */

namespace TripSorter\Renderer;

use TripSorter\Mapper\Ticket;

class Train extends AbstractBase {

    /**
     * @param Ticket\AbstractBase $ticket
     * @return string
     * @throws \Exception
     */
    public function renderTicket(Ticket\AbstractBase $ticket) {
        if (!($ticket instanceof Ticket\Train)) {
            throw new \Exception("Renderer Train cannot be used on a ticket " . get_class($ticket));
        }
        /** @var Ticket\Train $ticket */
        $result = "Take train {$ticket->number()} from {$ticket->placeFrom()} to {$ticket->placeTo()}.";
        $result .= " Sit in seat {$ticket->seat()}.";
        return $result;
    }
}