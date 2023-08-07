<?php

class Patients {

    private $firstname;  // Propriété privée pour stocker le prénom du patient
    private $lastname;   // Propriété privée pour stocker le nom de famille du patient
    private $birthdate;  // Propriété privée pour stocker la date de naissance du patient

    public function __construct($firstname, $lastname, $birthdate) {

        $this->firstname = $firstname;  // Initialise la propriété prénom avec la valeur fournie
        $this->lastname = $lastname;    // Initialise la propriété nom de famille avec la valeur fournie
        $this->birthdate = $birthdate;  // Initialise la propriété date de naissance avec la valeur fournie
    }

    public function getFirstName() {
        return $this->firstname;  // Méthode publique pour obtenir le prénom du patient
    }

    public function getLastName() {
        return $this->lastname;   // Méthode publique pour obtenir le nom de famille du patient
    }

    public function getBirthDate() {
        return $this->birthdate;  // Méthode publique pour obtenir la date de naissance du patient
    }

}


// Connexion à la base de données 
$db = 'mysql:host=127.0.0.1;port=8889;dbname=hospitalE2N;charset=utf8';
$username = 'root';
$password = 'root';

//Ajout de patient
if(ISSET($_POST['submit'])){
    try
    {
        $connexion = new PDO($db, $username, $password);  // Établit une connexion à la base de données
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO patients(lastname, firstname, birthdate, phone, mail) VALUES (?,?,?, ?, ?)"; // Insertion SQL
        $res = $connexion->prepare($sql); // Préparation de l'exécution SQL
        $exec = $res->execute([ 
            $_POST['lastname'],
            $_POST['firstname'],
            $_POST['birthdate'],
            $_POST['phone'],
            $_POST['mail']
        ]); // Exécution avec envoi des variables du formulaire
    
        
        // vérifier si la requête d'insertion a réussi
        if($exec){
            header("Location: ".$_SERVER['PHP_SELF']); // Redirection vers la même page après l'ajout du patient
            exit; // Arrêter l'exécution du script après la redirection
        }
        else{
            echo "Échec de l'opération d'insertion";
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}


try {
    $connection = new PDO($db, $username, $password);  // Établit une connexion à la base de données
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$query = "SELECT lastname, firstname, birthdate FROM patients";  // Requête SQL pour sélectionner les données des patients
$stmt = $connection->prepare($query);  // Prépare la requête
$stmt->execute();  // Exécute la requête préparée

$patientsList = array(); // Création d'une liste des patients vide sous forme de tableau 

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $patient = new Patients($row['lastname'], $row['firstname'], $row['birthdate']);  // Crée un objet Patient avec les données récupérées
    $patientsList[] = $patient;  // Ajoute l'objet Patient à la liste des patients
}

//$connection = null;  // Ferme la connexion à la base de données

// Affiche les données des patients en utilisant les méthodes d'objet
foreach ($patientsList as $patient) {
    echo "Nom : " . $patient->getLastName() . "<br>";
    echo "Prénom : " . $patient->getFirstName() . "<br>";
    echo "Date de naissance : " . $patient->getBirthDate() . "<br><br>";
}
?>



<form method="POST">
		<label>Prénom</label>
		<input type="text" name="firstname" placeholder="Votre Prénom" />
		<label>Nom</label>
		<input  type="text" name="lastname" placeholder="Votre Nom" />
		<label>Date de naissance</label>
		<input type="text" name="birthdate" placeholder="2022-12-04" />
        <label>Tel</label>
		<input type="text" name="phone" placeholder="0000000000" />
        <label>Mail</label>
		<input type="text" name="mail" placeholder="mail@mail.com" />
    <button type="submit" name="submit">Enregistrer</button>
</form>

<?php

?>