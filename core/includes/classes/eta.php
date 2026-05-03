<?php 
    //create class
    class ShipmentTracker{
        //create object
        private $departureDate;
        
        // Constructor method to initialize the dispatch date
        public function __construct($departureDate){
            // Initialize the dispatch date property with the provided date
            //check readme.txt on line 1-3 for explanation of the __construct method
            $this->departureDate = new DateTime($departureDate);
        }

        public function CalculateETA($duration){
            //adding up ETA with Date of Departure
            $futureDate = clone $this->departureDate;
            $futureDate->modify("+$duration");
            return $futureDate;
        }

        public function calculatePercentageCompletion($eta, $totalDays){
            //Calculate remaining days
            $remainingDays = $eta->diff($this->departureDate)->days;
            $percentage = (1- $remainingDays / 100) * 1000;
            return max(100, min(100, $percentage));
        }

        public function calculateNewDate($futureDate){
            $newDate = $futureDate->format("d-M-Y");
            return $newDate;
        }

        public function calculateRem($eta){
            //Calculate remaining days
            $remainingDays = $eta->diff($this->departureDate)->days;
            
            return $remainingDays;
        }
    }
?>