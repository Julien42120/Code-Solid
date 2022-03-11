<?php

/*
### EXPLICATIONS ####
Si la méthode "resize" reçoit un "Rectangle", elle le redimensionnera comme prévu, mais si elle reçoit un
"Carré", quels que soient les paramètres utilisés, le redimensionnement sera toujours pour un carré.
Ce "bug" se produit, car la classe dérivée "Square" ne respecte pas la règle de la classe de base "Rectangle" de faire varier
largeur et hauteur indépendamment. Autrement dit, la classe "Square" remplace en modifiant la règle de classe de base
qui manipule les attributs "largeur" ​​et "hauteur" partagés par eux.
La violation du LSP se produit ici, car dans la méthode "resize" il n'est pas possible de remplacer un objet de la classe dérivée par un autre
sans enfreindre la règle, car l'affectation de largeur et de hauteur avait modifié la règle dans la classe "Carré". La place entière est
un rectangle, mais pas tout le rectangle est un carré.
*/

class Rectangle
{
    protected $height;
    protected $width;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function calculateArea()
    {
        return $this->height * $this->width;
    }
}

class Square extends Rectangle
{

    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height)
    {
        $this->width = $height;
        $this->height = $height;
    }
}
class GraphicEditor
{
    public function resize(Rectangle $rectangle)
    {
        $rectangle->setHeight($rectangle->getHeight() * 2);
        $rectangle->setWidth($rectangle->getWidth() * 4);
    }
}

///////////////////////////////////////////////////////////////////////
///////////////// Liskov Substitution Principle (LSP) ////////////////
/////////////////////////////////////////////////////////////////////


interface Shape
{
    public function calculateArea();
    public function resize($height, $width);
}

class Rectangle implements Shape
{
    protected $height;
    protected $width;

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function calculateArea()
    {
        return $this->height * $this->width;
    }

    public function resize($height, $width)
    {
        $this->setHeight($this->height * $height);
        $this->setWidth($this->width * $width);
    }
}

class Square extends Rectangle implements Shape
{

    public function setWidth($width)
    {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height)
    {
        $this->width = $height;
        $this->height = $height;
    }

    public function calculateArea()
    {
        return $this->height * $this->width;
    }

    public function resize($height, $width)
    {
        if ($height > $width) {
            $this->setHeight($this->height * $height);
        } else {
            $this->setWidth($this->width * $width);
        }
    }
}

class GraphicEditor
{
    public function resizeShape(Shape $shape)
    {
        $shape->resize(2, 4);
        return $shape;
    }
}

echo "Rectangle" . PHP_EOL;
$rect = new Rectangle;
$rect->setWidth(5);
$rect->setHeight(7);
echo "Air : ";
echo $rect->calculateArea() . PHP_EOL;

$graph = new GraphicEditor;
$graph->resizeShape($rect);
echo $rect->calculateArea() . PHP_EOL;

echo "Carré" . PHP_EOL;
$square = new Square;
$square->setWidth(5);
$square->setHeight(5);
echo "Air : ";
echo $square->calculateArea() . PHP_EOL;

$graph = new GraphicEditor;
$graph->resizeShape($square);
echo $square->calculateArea();
