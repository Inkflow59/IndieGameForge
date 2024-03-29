<?php
session_start();
//Récupération des données utilisateur
$pseudo=$_SESSION['pseudo'];
$id=$_SESSION['id'];

//Récupération des données du formulaire
$titre=$_POST["titre"];
$type=$_POST["typeJeu"];
$dev=$_POST["dev"];
$description=$_POST["description"];
$langue=$_POST["langue"];
$plateforme=$_POST["plateforme"];
$date=$_POST["datePubli"];

//Connexion à la base de données
$db=mysqli_connect("localhost","root","","indiegameforge");
if(!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../userPages/userCreateGames.html");
}   else{
    $create="INSERT INTO jeu VALUES('$titre', '$type', '$dev', '$description', '$langue', '$plateforme' ,'$date', $id);";
    if(mysqli_query($db,$create)) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Jeu créé !</h1>";
        sleep(5);
        header("../userPages/userGames.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de création du jeu !</h1>";
        sleep(5);
        header("Location: ../userPages/userCreateGames.html");
    }
}
?>