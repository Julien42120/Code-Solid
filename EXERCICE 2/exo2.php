<?php

namespace OCPViolation;

class GasStation
{

    public function putGasInVehicle(Vehicle $vehicle)
    {
        if ($vehicle->getType() == 1)
            $this->putGasInCar($vehicle);
        elseif ($vehicle->getType() == 2)
            $this->putGasInMotorcycle($vehicle);
    }

    public function putGasInCar(Car $car)
    {
        $car->setTank(50);
    }

    public function putGasInMotorcycle(Motorcycle $motorcycle)
    {
        $motorcycle->setTank(20);
    }
}

class Vehicle
{
    protected $type;
    protected $tank;

    public function getType()
    {
        return $this->type;
    }

    public function setTank($tank)
    {
        $this->tank = $tank;
    }
}

class Car extends Vehicle
{
    protected $type = 1;
}

class Motorcycle extends Vehicle
{
    protected $type = 2;
}


////////////////////////////////////////////////////////////
//////////// Open/Closed Principle (OCP) ///////////////////
////////////////////////////////////////////////////////////


namespace OCPViolation;

interface IVehicule
{
    public function putGasInVehicle(IVehicule $iVehicule);
}

class GasStation
{
    public function putGas(IVehicule $iVehicule)
    {
        $iVehicule->putGasInVehicle($iVehicule);
    }
}

abstract class Vehicle implements IVehicule
{
    protected $tank;

    public function setTank($tank)
    {
        $this->tank = $tank;
    }

    public function getTank()
    {
        return $this->tank;
    }
}

class Car extends Vehicle implements IVehicule
{
    public function putGasInVehicle(IVehicule $iVehicule)
    {
        $iVehicule->setTank(50);
        echo "Je mets " . $iVehicule->getTank() . " litres de gasoil dans ma voiture" . PHP_EOL;
    }
}

class Motorcycle extends Vehicle implements IVehicule
{
    public function putGasInVehicle(IVehicule $iVehicule)
    {
        $iVehicule->setTank(20);
        echo "Je mets " . $iVehicule->getTank() . " litres d'essence dans ma moto" . PHP_EOL;
    }
}

$g = new GasStation;
$c = new Car;
$g->putGas($c);

$gs = new GasStation;
$m = new Motorcycle;
$gs->putGas($m);
