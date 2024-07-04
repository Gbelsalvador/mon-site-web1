<?php
    $serveur = "localhost";
    $utilisateur = "gg";
    $motDepasse = "ppppp";
    $basededonner = "boboto";
    $connexion = new mysqli ($serveur, $utilisateur, $motDepasse, $basededonner);
        if($connexion->connect_error) {
             die("la connexion a la base de donner a echouer : " . $connexion->connect_error);
        }
    $nom = $_POST['nom'];
    $pass_admin = $_POST['password'];
    $query = "INSERT INTO administrateurs (nom, pass_admin) VALUES ('$nom', '$pass_admin')";
    if($connexion->query($query) === TRUE){
        echo "compte administrateur cree avec succes !";
    }else{
        echo "erreur lors de la creation du compte administrateur : " . $connexion->error;
    }
    $connexion->close();
    ?>