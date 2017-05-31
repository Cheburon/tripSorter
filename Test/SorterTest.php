<?php
/**
 * Created by PhpStorm.
 * User: Slava
 * Date: 31.05.2017
 * Time: 6:40
 */

namespace Test;

use TripSorter\Sorter;
use TripSorter\Container;
use TripSorter\Mapper\Ticket;

class SorterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param Ticket\AbstractBase[] $tickets
     * @param Ticket\AbstractBase[] $expectedTickets
     * @dataProvider sorterProvider
     */
    public function testSorter($tickets, $expectedTickets) {
        /** @var Sorter\Service $sorterService */
        $sorterService = Container::getInstance()->getService("Sorter");
        $actualTickets = $sorterService->sort($tickets);
        $this->assertEquals($expectedTickets, $actualTickets);
    }

    /**
     * @return array
     */
    public function sorterProvider() {
        $ticket1 = new TicketStub("A", "B");
        $ticket2 = new TicketStub("B", "C");
        $ticket3 = new TicketStub("C", "D");
        $ticket4 = new TicketStub("D", "E");

        return [
            [
                [
                    $ticket3,
                    $ticket1,
                    $ticket4,
                    $ticket2,
                ], [
                    $ticket1,
                    $ticket2,
                    $ticket3,
                    $ticket4,
                ]
            ], [
                [
                    $ticket4,
                    $ticket3,
                ], [
                    $ticket3,
                    $ticket4,
                ]
            ]
        ];
    }

}