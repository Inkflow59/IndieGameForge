<?php
$pseudo=$_POST['pseudo'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$birth=$_POST['birthdate'];
$start=$_POST['programming_start_year'];
$pays=$_POST['nationality'];
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
    $inscription="INSERT INTO developpeur VALUES('$nom', '$prenom', '$nom', '$pays', '$start', '$birth', DATE(NOW()), '$pseudo', '$mdp');";

    if(mysqli_query($db, $inscription)) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur créé !</h1>";
        sleep(10);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de création dans la base de données !</h1>";
        sleep(10);
        header("Location: ../index.html");
    }
}
?>