<?php
class Animal {

    public $poil = true;
    public $live = 'je suis un être vivant';

    public function info() {
        echo 'je suis un animal, donc '.$this->live.'<br>';
    }
}

class Mammifere extends Animal {

    public $pattes = 4;

    public function infoPlus()  {
        echo 'je suis un mammifère et je peux avoir '.$this->pattes.' pattes.<br>';
    }
}

class Chien extends Mammifere {
    public function crie() {

        if ($this->poil) {
            echo 'j\'aboie, '.$this->live.' et j\'ai '.$this->pattes. ' pattes donc je suis un chien';
        }
        else {
            echo 'je suis rasé !';
        }
        
    }
}

$youyou = new Chien();

$youyou->info();
$youyou->infoPlus();
$youyou->crie();