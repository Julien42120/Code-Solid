<?php
/*
### EXPLICATIONS ####
La classe "Bicycle" est nécessaire pour implémenter les méthodes "turnOn" et "fuel", car l'interface "Vehicle" est trop générique.
Chaque fois que j'implémente une interface, toutes ses méthodes devraient être utiles pour la classe en question. S'il y a
une méthode inutile est implémentée, ou vous implémentez la mauvaise interface, ou l'interface est générique
trop et doivent être séparés, ou séparés en interfaces plus spécifiques.
*/

interface Vehicle
{
    public function turnOn();
    public function run();
    public function fuel();
}

class Motorcycle implements Vehicle
{
    public function turnOn()
    {
        echo 'Motorcycle Turning on...';
    }

    public function run()
    {
        echo 'Motorcycle running...';
    }

    public function fuel()
    {
        echo 'Fuel the Motorcycle';
    }
}

class Bicycle implements Vehicle
{
    public function turnOn()
    {
        //does nothing, because bicycles doesn't turn on
    }

    public function run()
    {
        echo 'Bicycle running...';
    }

    public function fuel()
    {
        //does nothing, because bicycles doesn't turn on
    }
}

/////////////////////////////////////////////////////////////////////
////////////    Interface Segregation Principle (ISP)   /////////////
/////////////////////////////////////////////////////////////////////


/*
### EXPLICATIONS ####
La classe "Bicycle" est nécessaire pour implémenter les méthodes "turnOn" et "fuel", car l'interface 
"Vehicle" est trop générique.
Chaque fois que j'implémente une interface, toutes ses méthodes devraient être utiles pour la 
classe en question. S'il y a
une méthode inutile est implémentée, ou vous implémentez la mauvaise interface, ou l'interface est
générique trop et doivent être séparés, ou séparés en interfaces plus spécifiques.
*/

interface MotorElect
{
    public function elect();
    public function start();
}

interface MotorFuel
{
    public function fuel();
    public function turnOn();
}

interface Vehicle
{
    public function run();
}

class Motorcycle implements Vehicle, MotorFuel
{
    public function turnOn()
    {
        echo 'Motorcycle Turning on...' . PHP_EOL;
    }

    public function run()
    {
        echo 'Motorcycle running...' . PHP_EOL;
    }

    public function fuel()
    {
        echo 'Fuel the Motorcycle' . PHP_EOL;
    }
}

class Bicycle implements Vehicle
{
    public function run()
    {
        echo 'Bicycle running...' . PHP_EOL;
    }
}

class Trottinette implements Vehicle, MotorElect
{
    public function start()
    {
        echo 'Trottinette Start...' . PHP_EOL;
    }

    public function run()
    {
        echo 'Trottinette running...' . PHP_EOL;
    }

    public function elect()
    {
        echo 'Electric Motor ' . PHP_EOL;
    }
}

$moto = new Motorcycle;
$moto->turnOn();
$moto->run();
$moto->fuel();


$bicyclette = new Bicycle;
$bicyclette->run();


$trott = new Trottinette;
$trott->start();
$trott->run();
$trott->elect();
