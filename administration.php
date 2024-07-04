<?php
session_start();
if(!isset($_SESSION['nom'])){
    header('location:connexion.php');
    exit;
}
$serveur = "localhost";
$utilisateur = "gg";
$motDepasse = "ppppp";
$basededonner = "boboto";
$connexion = new mysqli ($serveur, $utilisateur, $motDepasse, $basededonner);
    if($connexion->connect_error) {
             die("la connexion a la base de donner a echouer : " . $connexion->connect_error);
        }

    $connexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administration marcello zago</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>

<body>
    
</body>

<body>
    <header>
        <div class="container">
            <h1>ADMINISTRARTION ECOLE MARCELLO ZAGO</h1>
            <nav>
                <ul>
                    <li><a href="#">acceuil</a></li>
                    <li><a href="info.php">informations </a></li>
                    <li><a href="dd.php">gestion d'inscription</a></li>
                    <li><a href="deconnexion.php">deconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="container">
            <h2>Bienvenue dans l'interface d'administration</h2>
            <p>gerez efficacement tous les aspect de l'ecole marcello zago</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy;2024 ecoles marcello zago. tous droits reserves.</p>
        </div>
    </footer>
</body>
</html>