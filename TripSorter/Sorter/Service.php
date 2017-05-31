<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 1:54
 */

namespace TripSorter\Sorter;


use TripSorter\Mapper\Ticket;

class Service {

    /**
     * @param Ticket\AbstractBase[] $tickets
     * @return Ticket\AbstractBase[]
     */
    public function sort(array $tickets) {
        $places = [];
        $entryPlaces = [];
        foreach ($tickets as $ticket) {
            if (!array_key_exists($ticket->placeFrom(), $places)) {
                $placeFrom = new Place($ticket->placeFrom());
                $places[$ticket->placeFrom()] = $placeFrom;
            } else {
                $placeFrom = $places[$ticket->placeFrom()];
            }
            $placeFrom->ticketOut = $ticket;
            if ($placeFrom->ticketIn === null) {
                $entryPlaces[$placeFrom->name()] = $placeFrom;
            }

            if (!array_key_exists($ticket->placeTo(), $places)) {
                $placeIn = new Place($ticket->placeTo());
                $places[$ticket->placeTo()] = $placeIn;
            } else {
                $placeIn = $places[$ticket->placeTo()];
            }
            $placeIn->ticketIn = $ticket;
            if (array_key_exists($placeIn->name(), $entryPlaces)) {
                unset($entryPlaces[$placeIn->name()]);
            }
        }

        /** @var Place $place */
        $place = array_shift($entryPlaces);
        $sortedTickets = [];
        while ($place->ticketOut !== null) {
            $ticketOut = $place->ticketOut;
            $sortedTickets[] = $ticketOut;
            $place = $places[$ticketOut->placeTo()];
        }

        return $sortedTickets;
    }
}