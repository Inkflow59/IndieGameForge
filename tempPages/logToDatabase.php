<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <div class="flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-purple-500"></div>
        </div>
        <h1 class="text-4xl font-bold text-gray-800">Connexion en cours...</h1>
    </div>
</body>
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
    header("Location: ../index.php");
}   else {
    $connexion=mysqli_query($db,"SELECT idDev FROM developpeur WHERE username='$pseudo' AND password='$mdp';");

    if($connexion>=1) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur connecté !</h1>";
        sleep(10);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Vous n'avez pas été connecté !</h1>";
        sleep(10);
        header("Location: ../index.php");
    }
}
?>
</html>