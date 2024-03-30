<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Jeux de l'utilisateur - IndieGameForge</title>
</head>
<body class="bg-gray-100">
    <nav class="flex items-center justify-center bg-blue-500 text-white py-4" aria-label="Main navigation">
        <ul class="flex space-x-4">
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userCreateGames.html">Créer son jeu</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="#">Consulter ses jeux</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="allGames.php">Consulter les autres jeux</a>
          </li>
        </ul>
      </nav>
</body>

<?php
//Fetch des variables sessions
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
  //Comptage des jeux du développeur
  $jeuxID=mysqli_query($db, "SELECT idJeu FROM jeu WHERE idDev=$id;");
  $count=0;
  while($idTab=mysqli_fetch_array($jeuxID)) {
    $count++;
  }

  if($count==0) {
    echo "<h2 class='text-2xl font-bold mb-6 mt-2 dark:text-white text-center'>Tiens ? Mais c'est vide !</h2>";
} else {
  $jeuxRech=mysqli_query($db,"SELECT * FROM jeu WHERE idDev=$id ORDER BY idJeu ASC;");
  while($jeuTab=mysqli_fetch_array($jeuxRech)) {
    echo "<p class='font-italic mb-6 mt-4 dark:text-white text-center'>";
    echo $jeuTab['nomJeu']." : Développé par ".$jeuTab['studioDevJeu']." avec ".$jeuTab['moteurLanguageJeu']." de type ".$jeuTab['typeJeu'].".<br>";
    echo $jeuTab['descriptionJeu']."<br>";
    echo "Sortie prévue sur ".$jeuTab['plateforme']." le ".$jeuTab['dateSortie']."<br>";
    $moyenneReq=mysqli_query($db, "SELECT AVG(noteJeu) FROM note WHERE idJeu=".$jeuTab['idJeu'].";");
    while($tabMoy=mysqli_fetch_array($moyenneReq)) {
      $moyenne=$tabMoy["AVG(noteJeu)"];
    }
    echo "La moyenne des notes reçues par les autres développeurs est de $moyenne/10<br>";
    echo "<form method='POST' action='modifyGames.php><button type='submit' value='".$jeuTab['idJeu']."' id='idJeu' name='idJeu'class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none'>Modifier les informations du jeu</button></form></p><br>";
    }
  }
}
?>
</html>