<?php

interface Workable
{
    public function canCode();
    public function code();
    public function test();
}

class Programmer implements Workable
{
    public function canCode()
    {
        return true;
    }

    public function code()
    {
        return 'coding';
    }

    public function test()
    {
        return 'testing in localhost';
    }
}

class Tester implements Workable
{
    public function canCode()
    {
        return false;
    }

    public function code()
    {
        throw new Exception('Opps! I can not code');
    }

    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement
{
    public function processCode(Workable $member)
    {
        if ($member->canCode()) {
            $member->code();
        }
    }
}


//////////////////////////////////////////////////
//////////////// Project Management 2 ////////////
//////////////////////////////////////////////////

interface IWorkProgrammeur extends IWorkTester
{
    public function code();
}

interface IWorkTester
{
    public function test();
}

class Programmer implements IWorkProgrammeur, IWorkTester
{
    public function code()
    {
        echo 'coding' . PHP_EOL;
    }

    public function test()
    {
        echo 'testing in localhost' . PHP_EOL;
    }
}


class Tester implements IWorkTester
{
    public function test()
    {
        echo 'testing in test server' . PHP_EOL;
    }
}

class ProjectManagement
{
    public function processProg(IWorkProgrammeur $member)
    {
        $member->code($member);
        $member->test($member);
    }

    public function processTest(IWorkTester $member)
    {
        $member->test($member);
    }
}

$testeur = new Tester;
$projectTesteur = new ProjectManagement;

$programmeur = new Programmer;
$projectProgrammeur = new ProjectManagement;

echo "TESTEUR :" . PHP_EOL;
$projectTesteur->processTest($testeur);
echo "PROGRAMMEUR :" . PHP_EOL;
$projectProgrammeur->processProg($programmeur);
