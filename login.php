<?php
session_start();
include 'connex.php';
    $nom = $_POST['nom'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM administrateurs WHERE nom = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param('s', $nom);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    if($user && $password ===  $user['pass_admin']){
        $_SESSION['nom'] = $user['nom'];
        header('location:administration.php');
        exit;
    }else{
        echo "erreur veuillez recommencer";
    }
    $stmt->close();
    $connexion->close();
    ?>