<?php
session_start();
$db=mysqli_connect('localhost','root','','indiegameforge');

$id=$_SESSION['idMod'];

if(!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../userPages/userGames.php");
}   else {
    if(isset($_POST['titre'])){
        $titre=$_POST['titre'];
        $titre=mysqli_real_escape_string($db,$titre);
        $req="UPDATE jeu SET nomJeu='$titre' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['type'])){
        $type=$_POST['type'];
        $type=mysqli_real_escape_string($db,$type);
        $req="UPDATE jeu SET typeJeu='$type' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['studio'])){
        $studio=$_POST['studio'];
        $studio=mysqli_real_escape_string($db,$studio);
        $req="UPDATE jeu SET studioDevJeu='$studio' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['description'])){
        $description=$_POST['description'];
        $description=mysqli_real_escape_string($db,$description);
        $req="UPDATE jeu SET descriptionJeu='$description' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['moteur'])){
        $moteur=$_POST['moteur'];
        $moteur=mysqli_real_escape_string($db,$moteur);
        $req="UPDATE jeu SET moteurLanguageJeu='$moteur' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['plateforme'])){
        $plateforme=$_POST['plateforme'];
        $plateforme=mysqli_real_escape_string($db,$plateforme);
        $req="UPDATE jeu SET plateforme='$plateforme' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
    
    if(isset($_POST['sortie'])){
        $sortie=$_POST['sortie'];
        $req="UPDATE jeu SET dateSortie='$sortie' WHERE idJeu=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../userPages/userGames.php");
        }
    }
}
?>