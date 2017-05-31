<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 1:46
 */

namespace TripSorter;

use TripSorter\Mapper\Ticket;

class Facade {

    /**
     * @param Ticket\AbstractBase[] $tickets
     * @return array [string]
     * @throws \Exception
     */
    public function makeTrip(array $tickets) {
        /** @var Sorter\Service $sorterService */
        $sorterService = Container::getInstance()->getService("Sorter");
        /** @var Render $renderService */
        $renderService = Container::getInstance()->getService("Render");
        
        $sortedTickets = $sorterService->sort($tickets);
        $descriptionList = [];
        $iterator = 1;
        foreach ($sortedTickets as $ticket) {
            $descriptionList[] = "{$iterator}. " . $renderService->renderTicket($ticket);
            $iterator++;
        }
        $descriptionList[] = "{$iterator}. You have arrived at your final destination.";
        return $descriptionList;
    }
}