<?php

class Programmer
{
    public function code()
    {
        return 'coding';
    }
}

class Tester
{
    public function test()
    {
        return 'testing';
    }
}

class ProjectManagement
{
    public function process($member)
    {
        if ($member instanceof Programmer) {
            $member->code();
        } elseif ($member instanceof Tester) {
            $member->test();
        };

        throw new Exception('Invalid input member');
    }
}

//////////////////////////////////////////////////////////////
////////////////// Project Manager //////////////////////////
/////////////////////////////////////////////////////////////

interface IProgrammer
{
    public function code();
}

interface ITester
{
    public function test();
}

class Programmer implements IProgrammer
{
    public function code()
    {
        echo 'coding' . PHP_EOL;
    }
}

class Tester implements ITester
{
    public function test()
    {
        echo 'testing' . PHP_EOL;
    }
}

class ProjectManagement
{
    public function process(IProgrammer $member)
    {
        $member->code();
    }
}

$programeur = new Programmer;
$testeur = new Tester;

$project = new ProjectManagement;

$project->process($programeur);
$testeur->test();
