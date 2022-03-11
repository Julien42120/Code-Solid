<?php

namespace DIPViolation;

class Worker
{
    public function work()
    {
        // ....working
    }
}

class SuperWorker
{
    public function work()
    {
        //.... working much more
    }
}

class Manager
{
    /** @var Worker */
    private $worker;

    /**
     * @param Worker $worker
     */
    public function setWorker(Worker $worker)
    {
        $this->worker = $worker;
    }

    public function manage()
    {
        $this->worker->work();
    }
}

$manager = new Manager();

//will not work
$manager->setWorker(new SuperWorker());
$manager->manage();

//will work
$manager->setWorker(new Worker());
$manager->manage();


//////////////////////////////////////////////////////////////
//////// Dependency Inversion Principle (DIP) //////////////////
//////////////////////////////////////////////////////////////


namespace DIPViolation;

interface IWorking
{
    public function work();
}

class Worker implements IWorking
{
    public function work()
    {
        echo "Travail" . PHP_EOL;
    }
}

class SuperWorker implements IWorking
{
    public function work()
    {
        echo "Travail encore plus" . PHP_EOL;
    }
}

class Manager
{
    /** @var IWorking */
    private IWorking $worker;

    /**
     * @param IWorking $worker
     */
    public function setWorker(IWorking $worker)
    {
        $this->worker = $worker;
    }

    public function manage()
    {
        $this->worker->work();
    }
}

$manager = new Manager();

//will not work
$manager->setWorker(new SuperWorker());
$manager->manage();

//will work
$manager->setWorker(new Worker());
$manager->manage();
