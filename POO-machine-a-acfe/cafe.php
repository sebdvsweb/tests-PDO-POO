<?php 

class MachineACafe {

    private $marque;
    private $cafe;
    private $enFonction;
    private $extinction;
    private $prix = 1;
    private $paiement;

    public function __construct($marque) {
        $this->marque = $marque;
    }

    public function allumage($cafe) {
        $this->cafe = $cafe;
        if($this->cafe) {
            echo '1. '.$this->marque.' est en fonction<br>';
        }
        else {
            echo $this->marque.' semble en panne<br>';
        }
    }

    public function payer($prix, $paiement) {
        $this->prix = $prix;
        $this->paiement = $paiement;

        if($this->paiement > $this->prix) {
            echo '2. Merci pour votre paiement.<br>Votre monnaie est de '. ($this->paiement - $this->prix).'<br>';
        }
        else {
            echo '2. Merci pour le paiement<br>';
        }

    }

    public function mettreuneDosette() {
        if($this->enFonction = true) {
            echo'3. Je mets une dosette<br>';
        }
        else {
            echo '"2". Veuillez insérer une dosette<br>';
        }
    }

    public function faireDuCafe() {
        if($this->cafe && $this->enFonction = true) {
        echo '4. Le café est prêt<br>';
        $this->extinction = true;
    }
    else {
        echo '4. Il y a un souci de café.<br>';
    }

    }

    public function eteindre() {
        if ($this->extinction = true) {
            echo '5. Je peux m\'éteindre';
        }
        else {
            echo '5. Le café est en attente';
        }
    }

}


$machine = new MachineACafe('Senseo');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safé</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>

    .container {
        background: #F8F8F8;
    }
    i {
        font-size:36px;
        color: darkblue;
    }
</style>
<body>


<div class="container d-flex align-items-center justify-content-center">
    <div class="row">
        <div class="col-lg-3 py-5 d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-toggle-on"></i>
            <button class="btn btn-info"><?php echo $machine->allumage(true);?></button>
            <br><br>
            <i class="bi bi-currency-euro"></i>
            <button class="btn btn-info"><?php echo $machine->payer(1, rand(1,5));?></button>
            <br><br>
            <i class="bi bi-cup-hot"></i>
            <button class="btn btn-info"><?php echo $machine->mettreUneDosette();?></button>
        </div> 
        <div class="col-lg-6">
            <img src="img/coffee-machine.jpg" class="w-100" />
        </div> 
        <div class="col-lg-3 py-5 d-flex flex-column justify-content-center align-items-center">
        <i class="bi bi-gear"></i>
        <button class="btn btn-info"><?php echo $machine->faireDuCafe();?></button>
            <br><br>
            <i class="bi bi-toggle-off"></i>
            <button class="btn btn-info"><?php echo $machine->eteindre();?></button>
        </div> 
    </div>  
</div>    

    
</body>
</html>