<?php

class Player{
    private $name;
    private $position;

    // methods
    public function __construct($name, $position) 
    { 
         $this->name = $name; 
         $this->position = $position; 
    } 

    public function get_name(){
        return $this->name;
    }

    public function get_position(){
        return $this->position;
    }
}

?>