<?php

namespace Test;

use TripSorter\Sorter;
use TripSorter\Facade;
use TripSorter\Mapper\Ticket;

class TripSorterTest extends \PHPUnit_Framework_TestCase {

    /**
     * @param Ticket\AbstractBase[] $tickets
     * @param string[] $expectedTripDescriptions
     * @dataProvider tripSorterProvider
     */
    public function testTripSorter(array $tickets, array $expectedTripDescriptions) {
        $tripSorterService = new Facade();
        $tripDescriptionList = $tripSorterService->makeTrip($tickets);
        $this->assertEquals($expectedTripDescriptions, $tripDescriptionList);
    }

    /**
     * @return array
     */
    public function tripSorterProvider() {
        $ticketAir1 = new Ticket\Air("Gerona Airport", "Stockholm", "SK455", "3A", "45B", "344");
        $ticketAir2 = new Ticket\Air("Stockholm", "New York JFK", "SK22", "7B", "22", null, true);
        $ticketBus1 = new Ticket\Bus("Barcelona", "Gerona Airport", null, null, "airport");
        $ticketTrain1 = new Ticket\Train("Madrid", "Barcelona", "78A", "45B");
        return [
            [[
                $ticketAir2,
                $ticketAir1,
                $ticketBus1,
                $ticketTrain1
            ], [
                "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.",
                "2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.",
                "3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.",
                "4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.",
                "5. You have arrived at your final destination.",
            ]],
            [[
                $ticketTrain1,
                $ticketAir1,
                $ticketBus1,
                $ticketAir2,
            ], [
                "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.",
                "2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.",
                "3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.",
                "4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will be automatically transferred from your last leg.",
                "5. You have arrived at your final destination.",
            ]],
            [[
                $ticketTrain1,
                $ticketBus1,
            ], [
                "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.",
                "2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.",
                "3. You have arrived at your final destination.",
            ]],
            [[
                $ticketBus1,
            ], [
                "1. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.",
                "2. You have arrived at your final destination."
            ]]
        ];
    }
}