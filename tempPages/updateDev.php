<?php
session_start();
$db=mysqli_connect('localhost','root','','indiegameforge');

$id=$_SESSION['id'];

if(!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../modifyUser.php");
}   else {
    if(isset($_POST['prenom'])){
        $prenom=$_POST['prenom'];
        $prenom=mysqli_real_escape_string($db,$prenom);
        $req="UPDATE developpeur SET prenomDev='$prenom' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['nom'])){
        $nom=$_POST['nom'];
        $nom=mysqli_real_escape_string($db,$nom);
        $req="UPDATE developpeur SET nomDev='$nom' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['pays'])){
        $pays=$_POST['pays'];
        $pays=mysqli_real_escape_string($db,$pays);
        $req="UPDATE developpeur SET paysDev='$pays' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['start'])){
        $start=$_POST['start'];
        $start=mysqli_real_escape_string($db,$start);
        $req="UPDATE developpeur SET anneeDebutDev='$start' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['birth'])){
        $birth=$_POST['birth'];
        $req="UPDATE developpeur SET anneeNaissance='$birth' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['pseudo'])){
        $pseudo=$_POST['pseudo'];
        $pseudo=mysqli_real_escape_string($db,$pseudo);
        $req="UPDATE developpeur SET username='$pseudo' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
    
    if(isset($_POST['mdp'])){
        $mdp=$_POST['mdp'];
        $mdp=mysqli_real_escape_string($db,$mdp);
        $req="UPDATE developpeur SET password='$mdp' WHERE idDev=$id;";
        if(mysqli_query($db, $req)) {
            echo "<h1 class='text-4xl font-bold text-green-800'>Modifié !</h1>";
            sleep(5);
            header("Location: ../modifyUser.php");
        }
    }
}
?>