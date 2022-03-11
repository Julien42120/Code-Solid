<?php

namespace ISPViolation;


interface IWorker
{
    public function work();

    public function eat();
}


class Worker implements IWorker
{
    public function work()
    {
        // working
    }

    public function eat()
    {
        // eating in launch break
    }
}


class Robot implements IWorker
{

    public function work()
    {
        // working 24 hours per day
    }

    public function eat()
    {
        // doesn't need this method
    }
}


/////////////////////////////////////////////////////////////
//////////////// Interface Segregation Principle (ISP)///////
/////////////////////////////////////////////////////////////


namespace ISPViolation;

interface IWorker
{
    public function eat();
}

interface IWork
{
    public function work();
}

class Worker implements IWorker, IWork
{
    public function work()
    {
        echo "L'employé travail" . PHP_EOL;
    }

    public function eat()
    {
        echo "L'employé mange pendant la pause" . PHP_EOL;
    }
}

class Robot implements IWork
{

    public function work()
    {
        echo 'Le Robot travail 24 h par jour' . PHP_EOL;
    }
}
$worker = new Worker;
$worker->work();
$worker->eat();
$robot = new Robot;
$robot->work();
