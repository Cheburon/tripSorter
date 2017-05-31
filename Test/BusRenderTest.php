<?php

namespace Test;

use TripSorter\Mapper\Ticket;
use TripSorter\Render;
use TripSorter\Container;

class BusRenderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param Ticket\Bus $busTicket
     * @param string $expectedDescription
     * @dataProvider sorterProvider
     */
    public function testBusRender($busTicket, $expectedDescription) {
        /** @var Render $renderService */
        $renderService = Container::getInstance()->getService("Render");
        $actualDescription = $renderService->renderTicket($busTicket);
        $this->assertEquals($expectedDescription, $actualDescription);
    }

    /**
     * @return array
     */
    public function sorterProvider() {
        return [
            [
                new Ticket\Bus("A", "B"),
                "Take the bus from A to B. No seat assignment."
            ], [
                new Ticket\Bus("A", "B", "505"),
                "Take the bus number 505 from A to B. No seat assignment.",
            ], [
                new Ticket\Bus("A", "B", "505", "75D"),
                "Take the bus number 505 from A to B. Seat 75D.",
            ], [
                new Ticket\Bus("A", "B", "505", "75D", "train station"),
                "Take the train station bus number 505 from A to B. Seat 75D.",
            ], [
                new Ticket\Bus("A", "B", null, "75D", "train station"),
                "Take the train station bus from A to B. Seat 75D.",
            ], [
                new Ticket\Bus("A", "B", null, null, "train station"),
                "Take the train station bus from A to B. No seat assignment.",
            ], [
                new Ticket\Bus("A", "B", null, "75D"),
                "Take the bus from A to B. Seat 75D.",
            ]
        ];
    }

}