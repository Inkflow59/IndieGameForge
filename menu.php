<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Menu - IndieGameForge</title>
</head>
<body>
    <nav class="flex items-center justify-center bg-blue-500 text-white py-4" aria-label="Main navigation">
        <ul class="flex space-x-4">
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userPages/userCreateGames.html">Créer son jeu</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userPages/userGames.php">Consulter ses jeux</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userPages/allGames.php">Consulter les autres jeux</a>
          </li>
        </ul>
      </nav>

    <div class="fixed bottom-0 left-0 right-0 p-4 bg-white border-t border-gray-200 flex items-center justify-center"><a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md focus:outline-none" href="modifyUser.php">Mettre à jour ses infos</a>
</div>
</body>

<?php
session_start();
$db=mysqli_connect('localhost','root','','indiegameforge');
if(!$db) {
  echo "<p class='text-red-500 underline text-2xl font-bold'>Erreur de connexion à la base de données !</p>";
  header("Refresh:3");
} else {
  //Supression des valeurs POST
  if(isset($_POST['pseudo'])) {
    unset($_POST['pseudo']);
  }
  if(isset($_POST['prenom'])) {
    unset($_POST['prenom']);
  }
  if(isset($_POST['nom'])) {
    unset($_POST['nom']);
  }
  if(isset($_POST['birthdate'])) {
    unset($_POST['birthdate']);
  }
  if(isset($_POST['programming_start_year'])) {
    unset($_POST['programming_start_year']);
  }
  if(isset($_POST['nationality'])) {
    unset($_POST['nationality']);
  }
  if(isset($_POST['password'])) {
    unset($_POST['password']);
  }

  $pseudo=$_SESSION['pseudo'];
  $rechId=mysqli_query($db, "SELECT idDev FROM developpeur WHERE username='$pseudo';");
  while($tab=mysqli_fetch_assoc($rechId)) {
    $id=$tab['idDev'];
  }
  $_SESSION['id']=$id;
  echo"<div class='flex h-screen items-center justify-center'><h1 class='text-5xl font-bold text-center text-gray-800'>Bienvenue, $pseudo, sur notre plateforme de création de jeux, IndieGameForge !</h1></div>";
}
?>
</html>