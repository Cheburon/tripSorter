<?php

namespace TripSorter\Renderer;

use TripSorter\Mapper\Ticket;

class Bus extends AbstractBase {

    /**
     * @param Ticket\AbstractBase $ticket
     * @return string
     * @throws \Exception
     */
    public function renderTicket(Ticket\AbstractBase $ticket) {
        if (!($ticket instanceof Ticket\Bus)) {
            throw new \Exception("Renderer Bus cannot be used on a ticket " . get_class($ticket));
        }
        /** @var Ticket\Bus $ticket */
        $result = "Take the";
        if ($ticket->destination() !== null) {
            $result .= " {$ticket->destination()}";
        }
        $result .= " bus";
        if ($ticket->number() !== null) {
            $result .= " number {$ticket->number()}";
        }
        $result .= " from {$ticket->placeFrom()} to {$ticket->placeTo()}.";
        if ($ticket->seat() !== null) {
            $result .= " Seat {$ticket->seat()}.";
        } else {
            $result .= " No seat assignment.";
        }
        return $result;
    }
}