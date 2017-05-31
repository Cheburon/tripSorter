<?php

namespace TripSorter\Renderer;

use TripSorter\Mapper\Ticket;

class Air extends AbstractBase {

    /**
     * @param Ticket\AbstractBase $ticket
     * @return string
     * @throws \Exception
     */
    public function renderTicket(Ticket\AbstractBase $ticket) {
        if (!($ticket instanceof Ticket\Air)) {
            throw new \Exception("Renderer Air cannot be used on a ticket " . get_class($ticket));
        }
        /** @var Ticket\Air $ticket */
        $result = "From {$ticket->placeFrom()}, take flight {$ticket->flightNumber()} to {$ticket->placeTo()}.";
        $result .= " Gate {$ticket->gate()}, seat {$ticket->seat()}.";
        if ($ticket->baggageDropNumber() !== null) {
            $result .= " Baggage drop at ticket counter " . $ticket->baggageDropNumber() . ".";
        } elseif ($ticket->isBaggageDropAutoTransfer()) {
            $result .= " Baggage will be automatically transferred from your last leg.";
        }
        return $result;
    }
}