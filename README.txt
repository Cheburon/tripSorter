----------------------------------------------
How to launch tests:

1. Install PHPUnit https://phpunit.de/
2. Run "phpunit Test" from this directory
----------------------------------------------

----------------------------------------------
How to launch code with your own trip cards:

There is a file called example.php. It shows how you can use this component in your program.
You can modify TripSorterTest.php to test the whole component with different parameters.
----------------------------------------------

Assumptions:
1. I assume that there is no cycles in the trip path. Trip tickets with cycles example:
	
	- from A to B
	- from B to C
	- from C to A
	- from A to C
	- from C to D

2. I assume that air flights gate, seat and number parameters are mandatory. I also assume that train number is mandatory as well.