<?php

namespace SRPViolation;

class Modem
{
    public function dial($pno)
    {
        // Implementing dial($pno) method.
    }

    public function hangup()
    {
        //  Implementing hangup() method.
    }

    public function send($c)
    {
        // Implementing send($c) method.
    }

    public function receive()
    {
        // Implementing receive() method.
    }
}


///////////////////////////////////////////////////////
////////////////// Single Responsibility //////////////
///////////////////////////////////////////////////////


namespace SRPViolation;

interface IInOut
{
    public function send($c);
    public function receive();
}

interface IConnect
{
    public function dial($pno);
    public function hangUp();
}

class Modem
{
    protected IInOut $inOut;
    protected IConnect $connect;

    public function __construct(IInOut $inOut, IConnect $connect)
    {
        $this->inOut = $inOut;
        $this->connect = $connect;
    }

    public function send($c)
    {
        $this->inOut->send($c);
    }

    public function receive()
    {
        $this->inOut->receive();
    }

    public function dial($pno)
    {
        $this->connect->dial($pno);
    }

    public function hangup()
    {
        $this->connect->hangUp();
    }
}

class InOut implements IInOut
{
    public function send($c)
    {
        echo "j'appuie sur le " . $c . PHP_EOL;
    }

    public function receive()
    {
        echo "Je reçois un appel" . PHP_EOL;
    }
}

class Connect implements IConnect
{
    public function dial($pno)
    {
        echo "Je compose le" . $pno . PHP_EOL;
    }

    public function hangup()
    {
        echo "Je raccroche" . PHP_EOL;
    }
}

$m = new Modem(new InOut, new Connect);
$m->dial(4578956532);
$m->send('bouton');
$m->hangup();
