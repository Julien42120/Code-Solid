<?php
/*
 ### EXPLICATIONS ####
Étant donné que le principe "ouvert et fermé" dit que la classe doit être 
ouverte pour l'extension et fermée pour le changement,
cependant dans l'exemple ci-dessous, la méthode "drive" de 
la classe "Driver" devra être changée chaque fois qu'un nouveau type de véhicule 
sera créé. Autrement dit, lors de l'ajout d'un nouveau comportement, 
le code existant devra être modifié, allant complètement
contre le principe "Ouvert / Fermé"
*/

class Vehicle
{
    public function run()
    {
    }
}

class Motorcycle extends Vehicle
{
}

class Car extends Vehicle
{
}

class Driver
{
    public function drive(Vehicle $vehicle)
    {
        if ($vehicle instanceof Motorcycle) {
            $this->turnOnMotorcycle();
        }

        if ($vehicle instanceof Car) {
            $this->turnOnCar();
        }

        $vehicle->run();
    }

    private function turnOnCar()
    {
        echo 'Turning on the car';
    }

    private function turnOnMotorcycle()
    {
        echo 'Turning on the motorcycle';
    }
}


////////////////////////////////////////////////////////////////
//////////////// Open/Closed Principle (OCP) //////////////////
///////////////////////////////////////////////////////////////

interface VehicleInterface
{
    public function turnOn();
    public function run();
}

abstract class Vehicle implements VehicleInterface
{
    public function run()
    {
        echo "vroom je conduis" . PHP_EOL;
    }
    abstract public function turnOn();
}

class Motorcycle extends Vehicle implements VehicleInterface
{
    public function turnOn()
    {
        echo 'Turning on the motorcycle' . PHP_EOL;
    }
}

class Car extends Vehicle implements VehicleInterface
{
    public function turnOn()
    {
        echo 'Turning on the car' . PHP_EOL;
    }
}

class Driver
{
    public function drive(VehicleInterface $vehicle)
    {
        $vehicle->turnOn();
        $vehicle->run();
    }
}
