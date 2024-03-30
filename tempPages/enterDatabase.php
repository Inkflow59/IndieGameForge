<?php
$pseudo=$_POST['pseudo'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$birth=$_POST['birthdate'];
$start=$_POST['programming_start_year'];
$pays=$_POST['nationality'];
$mdp=$_POST['password'];

$db=mysqli_connect("localhost","root","","indiegameforge");
if (!$db) {
    echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de connexion à la base de données !</h1>";
    sleep(5);
    header("Location: ../index.html");
}   else {
    ///Sécurisation des données à insérer
    $pseudo=mysqli_real_escape_string($db, $pseudo);
    $prenom=mysqli_real_escape_string($db, $prenom);
    $nom=mysqli_real_escape_string($db, $nom);
    $start=mysqli_real_escape_string($db, $start);
    $pays=mysqli_real_escape_string($db,$pays);
    $mdp=mysqli_real_escape_string($db, $mdp);

    $inscription="INSERT INTO developpeur(`nomDev`, `prenomDev`, `paysDev`, `anneeDebutDev`, `dateNaissance`, `dateInscription`, `username`, `password`) VALUES('$nom', '$prenom', '$pays', '$start', '$birth', DATE(NOW()), '$pseudo', '$mdp');";

    if(mysqli_query($db, $inscription)) {
        //Déclaration des varibales de session
        session_start();
        $_SESSION['pseudo']=$pseudo;

        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur créé !</h1>";
        sleep(5);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de création dans la base de données !</h1>";
        sleep(5);
        header("Location: ../index.html");
    }
}
?>