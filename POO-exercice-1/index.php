<?php


class Formule1 {

    public $speed = 0;

    public function drive() {
        echo 'Vroom vroom à '.$this->speed. ' km/h<br>';
    }

    public function shiftGear() {
        $this->speed = rand(10,100);
    }

}

$myFormule1 = new Formule1();
$myFormule1->drive();
$myFormule1->shiftGear();
$myFormule1->drive();



