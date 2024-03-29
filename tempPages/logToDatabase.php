<?php
$pseudo=$_POST['pseudo'];
$mdp=$_POST['password'];

//Déclaration des varibales de session
session_start();
$_SESSION['pseudo']=$pseudo;

$db=mysqli_connect("localhost","root","","indiegameforge");
if (!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(10);
    header("Location: ../index.html");
}   else {
    $connexion=mysqli_query($db,"SELECT idDev FROM developpeur WHERE username='$pseudo' AND password='$mdp';");

    if($connexion>=1) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur connecté !</h1>";
        sleep(10);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Vous n'avez pas été connecté !</h1>";
        sleep(10);
        header("Location: ../index.html");
    }
}
?>