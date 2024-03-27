<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav class="flex items-center justify-center bg-blue-500 text-white py-4" aria-label="Main navigation">
        <ul class="flex space-x-4">
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="#create-game">Créer son jeu</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="#my-games">Consulter ses jeux</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="#other-games">Consulter les autres jeux</a>
          </li>
        </ul>
      </nav>
</body>

<?php
///Fetch des variables sessions
session_start();
$id=$_SESSION['id'];
$pseudo=$_SESSION['pseudo'];

echo "<h1 class='text-4xl font-bold mb-2 mt-24 dark:text-white text-center'>Quelle productivité, $pseudo ! Voici vos jeux :</h1>";
//Connexion à la BDD
$db=mysqli_connect("localhost","root","","indiegameforge");
if(!$db) {
    echo "<p class='text-red-500 underline text-2xl font-bold'>Erreur de connexion à la base de données !</p>";
    header("Refresh:3");
} else {
    $jeuxRech=mysqli_query($db, "SELECT idJeu FROM jeu WHERE idDev=$id;");
    $count=0;
    while($row=mysqli_fetch_array($jeuxRech)) {
        $count++;
    }

    if($count==0) {
        echo "<h2 class='text-2xl font-bold mb-6 mt-2 dark:text-white text-center'>Tiens ? Mais c'est vide !</h2>";
    }
}
?>
</html>