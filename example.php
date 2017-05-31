<?php

require_once "autoload.php";

$tickets = [new TripSorter\Mapper\Ticket\Bus("Barcelona", "Gerona Airport")];
$tripSorterService = new TripSorter\Facade();
$tripDescriptionList = $tripSorterService->makeTrip($tickets);
foreach ($tripDescriptionList as $tripDescription) {
    echo $tripDescription . "\n";
}
