<?php

class Dog{
    // Properties 
    private $name;
    private $breed;
    private $weight;

    // Constructor
    function __construct($name, $breed, $weight) { 
        $this->name = $name;
        $this->breed = $breed;
        $this->weight = $weight;
    }

    //GETTER & SETTER function
    function setName($name){
        $this->name = $name;
    }

    function setBreed($breed){
        $this->breed = $breed;
    }

    function setWeight($weight){
        $this->weight = $weight;
    }

    function getName(){
        return $this->name;
    }
    function getBreed(){
        return $this->breed;
    }
    function getWeight(){
        return $this->weight;
    }

    // Methods 
    function weightInPounds() { 
        // we need to convert kilograms to pounds 
        // there are 2.2 pounds in 1 kilogram 
        return $this->weight * 2.2;
    }

    function bark(){ 
        echo "<h1>WOOF</h1>";
    } 

    function eat(){ 
        echo "<h2>$this->name says food is Yummy</h2>";
    } 

    function run(){ 
        // do something 
    } 

    function sleep(){ 
        // do something 
    } 
}

$nuggetName = "Nugget";
$nuggetBreed = "Pomeranian";
$nuggetWeight = 7;

$spike = new Dog("Spikey", "Border Collie", 22);
$nugget = new Dog($nuggetName, $nuggetBreed, $nuggetWeight);
// $spike->name = "Spikey";
// $spike->setName("Spikey");
// $spike->setBreed("Border Collie");
// $spike->setWeight("22kg");

// $nugget->setName("Nugget");
// $nugget->setBreed("Pomeranian");
// $nugget->setWeight("10kg");

// $spike->breed = "Border Collie";
// $spike->weight = "32kg";

// echo $spike->name;
echo $spike->getName();
echo $spike->getBreed();
echo $spike->getWeight();
echo "<br>";
echo $nugget->getName();
echo $nugget->getBreed();
echo $nugget->getWeight();

$spike->bark();
$spike->eat();
$nugget->eat();
// echo $spike->breed;
// echo $spike->weight;

echo "<h3>Spikey is " . $spike->weightInPounds() . "lbs";
echo "<h3>Nugget is " . $nugget->weightInPounds() . "lbs";

?>