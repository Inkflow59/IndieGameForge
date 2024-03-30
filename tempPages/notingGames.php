<?php
//Connexion à la base de données + reprise de la session
session_start();
$pseudo=$_SESSION['pseudo'];
$id=$_SESSION['id'];

$db=mysqli_connect('localhost','root','','indiegameforge');

//Récupération des données POST et de l'id du jeu
$note=$_POST['rating'];
$idJeu=$_POST['idJeu'];

if(!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../userPages/allGames.php");
}   else {
    $requeteNote="INSERT INTO note VALUES($id, $idJeu, $note)";
    if(mysqli_query($db, $requeteNote)) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Jeu noté !</h1>";
        sleep(5);
        header("Location: ../userPages/allGames.php");
    } else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de la notation !</h1>";
        sleep(5);
        header("Location: ../userPages/allGames.php");
    }
}
?>