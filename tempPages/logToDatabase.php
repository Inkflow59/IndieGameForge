<?php

$db=mysqli_connect("localhost","root","","indiegameforge");
if (!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../index.html");
}   else {
    $pseudo=mysqli_real_escape_string($db, $_POST['pseudo']);
    $mdp=mysqli_real_escape_string($db, $_POST['password']);

    $connexion=mysqli_query($db,"SELECT idDev FROM developpeur WHERE username='$pseudo' AND password='$mdp';");

    if($connexion>=1) {
        //Déclaration des varibales de session
        session_start();
        $_SESSION['pseudo']=$pseudo;
        
        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur connecté !</h1>";
        sleep(5);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Vous n'avez pas été connecté !</h1>";
        sleep(5);
        header("Location: ../index.html");
    }
}
?>