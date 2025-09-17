<?php
require "Player.php";

class Team{
    public $name;
    public $manager;
    public $players = array();

    public function __construct($name, $manager, $players = array()) {
        $this->name = $name;
        $this->manager = $manager;
        $this->players = $players;
    }

    //methods
    public function get_players(){
        return $this->players;
    }

    public function add_player($player){
        //If you leave the square bracket empty, 
        //It will add to the last index of the array.
        $this->players[] = $player;
    }
}
$barca = new Team(
    "Barcelona FC", 
    "Hansi Flick"
);
$newPlayer = new Player("Lionel Messi", "Striker");

$barca->add_player($newPlayer);
$barca->add_player(new Player("David Beckham", "Midfielder"));

// $barca->add_player("Lionel Messi");
// $barca->add_player("Harry Kane");
// $barca->add_player("Neymar Jr.");
echo $barca->get_players()[0]->get_name();
echo $barca->get_players()[1]->get_name();
echo $barca->get_players()[1]->get_position();
?>