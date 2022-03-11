<?php
/*
### EXPLICATIONS ####
Dans l'exemple ci-dessous, nous pouvons voir que le bouton dépend d'une classe spécifique "Ordinateur" et connaît les détails de
sa mise en œuvre violant le DIP qui stipule que les détails doivent dépendre des abstractions.
*/

class Computer
{
    public function on()
    {
    }
}

class Button
{
    /**
     * @var Computer
     */
    private $computer;

    public function activate()
    {
        if (condition) { //some condition
            $this->computer->on();
        }
    }
}


//////////////////////////////////////////////////////////////////////////
/////////////// Dependency Inversion Principle (DIP) ////////////////////
////////////////////////////////////////////////////////////////////////


interface OnInterface
{
    public function on();
}

class Computer implements OnInterface
{
    public function on()
    {
        echo " je m'allume";
    }
}

class Button
{
    /**
     * @var Computer
     */

    public function activate(OnInterface $computer)
    {
        if ($computer) { //some condition
            $computer->on();
        }
    }
}

$pc = new Computer;
$button = new Button;
$button->activate($pc);
