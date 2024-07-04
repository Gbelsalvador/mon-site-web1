<?php
$serveur = "localhost";
$utilisateur = "gg";
$motDepasse = "ppppp";
$basededonner = "boboto";
$connexion = new mysqli($serveur, $utilisateur, $motDepasse, $basededonner);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}
// recuperation de la categorie depuis le parametre GET de l'url
$category = $_GET['category'] ?? null;
$students = []; //tableau pour stocker les noms des etudiants
//verification si une categorie est soecifie
if ($category) {
    switch ($category) {
        //cas ou la categorie est total
        case 'total':
            $result = $connexion->query("SELECT namestudent FROM inscription");
            while ($row = $result->fetch_assoc()) {
                $students[] = $row['namestudent']; // ajout du nom de l'etudiant au tableau
            }
            break;
        case 'male':
            $result = $connexion->query("SELECT namestudent FROM inscription WHERE sexstudent = 'masculin'");
            while ($row = $result->fetch_assoc()) {
                $students[] = $row['namestudent'];//ajout du nom de l'etudiant masculin au total
            }
            break;
        case 'female':
            $result = $connexion->query("SELECT namestudent FROM inscription WHERE sexstudent = 'feminin'");
            while ($row = $result->fetch_assoc()) {
                $students[] = $row['namestudent'];
            }
            break;
    }
}

$connexion->close();
// Encodage du tableau d'etudiant en json et affichage
echo json_encode($students);
?>