<?php
$serveur = "localhost";
$utilisateur = "gg";
$motDepasse = "ppppp";
$basededonner = "boboto";
$connexion = new mysqli ($serveur, $utilisateur, $motDepasse, $basededonner);
    if($connexion->connect_error) {
             die("la connexion a la base de donner a echouer : " . $connexion->connect_error);
        }

?>