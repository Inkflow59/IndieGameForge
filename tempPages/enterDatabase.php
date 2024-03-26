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
        <h1 class="text-4xl font-bold text-gray-800">Inscription en cours...</h1>
    </div>
</body>
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
    sleep(10);
    header("Location: ../index.php");
}   else {
    $inscription="INSERT INTO developpeur VALUES('$nom', '$prenom', '$nom', '$pays', '$start', '$birth', '$pseudo', '$mdp')";

    if(mysqli_query($db, $inscription)) {
        echo "<h1 class='text-4xl font-bold text-green-800'>Utilisateur créé !</h1>";
        sleep(10);
        header("Location: ../menu.php");
    }   else {
        echo "<h1 class='text-4xl font-bold text-red-800'>Erreur de création dans la base de données !</h1>";
        sleep(10);
        header("Location: ../index.php");
    }
}
?>
</html>