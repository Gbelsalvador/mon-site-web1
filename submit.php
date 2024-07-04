<?php
    $serveur = "localhost";
    $utilisateur = "gg";
    $motDepasse = "ppppp";
    $basededonner = "boboto";
    $connexion = new mysqli ($serveur, $utilisateur, $motDepasse, $basededonner);
        if($connexion->connect_error) {
             die("la connexion a la base de donner a echouer : " . $connexion->connect_error);
        }

// Récupérer les données du formulaire
$namestudent = $_POST['namestudent'];
$birthdaystudent = $_POST['birthdaystudent'];
$lieudenaissance = $_POST['lieudenaissance'];
$sexstudent = $_POST['sexstudent'];
$nationalite = $_POST['nationalite'];
$numerostudent = $_POST['numerostudent'];
$levelniveau = $_POST['levelniveau'];

$nameparent = $_POST['nameparent'];
$lienparent = $_POST['lienparent'];
$numeroparent = $_POST['numeroparent'];
$adresse = $_POST['adresse'];
$profession = $_POST['profession'];
$employeur = $_POST['employeur'];

$ecoleprecedente = $_POST['ecoleprecedente'];
$levelatteint = $_POST['levelatteint'];




// Préparer et exécuter l'insertion dans la base de données
$sql = "INSERT INTO inscription (namestudent, birthdaystudent, lieudenaissance, sexstudent, nationalite, numerostudent, levelniveau, nameparent, lienparent, numeroparent, adresse, profession, employeur, ecoleprecedente, levelatteint) VALUES ('$namestudent', '$birthdaystudent', '$lieudenaissance', '$sexstudent', '$nationalite', '$numerostudent', '$levelniveau', '$nameparent', '$lienparent', '$numeroparent', '$adresse', '$profession', '$employeur', '$ecoleprecedente', '$levelatteint')";

if ($connexion->query($sql) === TRUE) {
   echo "enregistrement reussi";
} else {
    echo "Erreur : " . $sql . "<br>" . $connexion->error;
}

$connexion->close();
?>