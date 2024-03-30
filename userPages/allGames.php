<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Jeux et notes - IndieGameForge</title>
</head>
<body class="bg-gray-100">
    <nav class="flex items-center justify-center bg-blue-500 text-white py-4" aria-label="Main navigation">
        <ul class="flex space-x-4">
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userCreateGames.html">Créer son jeu</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userGames.php">Consulter ses jeux</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="#">Consulter les autres jeux</a>
          </li>
        </ul>
      </nav>
</body>

<?php
//Connexion à la BDD et reprise de la session
session_start();
$db=mysqli_connect("localhost","root","","indiegameforge");

$id=$_SESSION['id'];
$pseudo=$_SESSION['pseudo'];

echo "<h1 class='text-4xl font-bold mb-2 mt-24 dark:text-white text-center'>D'autres utilisateurs sont comme vous, $pseudo ! Découvrez et notez leur jeu !</h1>";

if(!$db) {
    echo "<p class='text-red-500 underline text-2xl font-bold'>Erreur de connexion à la base de données !</p>";
    header("Refresh:3");
}   else{
    //Comptage des jeux
    $compteJeu=mysqli_query($db, "SELECT idJeu FROM jeu WHERE idDev!=$id;");
    $count=0;
    while($compTab=mysqli_fetch_array($compteJeu)) {
        $count++;
    }

    if($count==0) {
        echo "<h2 class='text-2xl font-bold mb-6 mt-2 dark:text-white text-center'>J'ai peut-être parlé trop vite...</h2>";
    }   else {
        $printJeu=mysqli_query($db,"SELECT * FROM jeu WHERE idDev!=$id;");
        while($tabJeux=mysqli_fetch_array($printJeu)) {
            echo "<div><p class='font-italic mb-6 mt-4 dark:text-white text-center'>";
            echo $tabJeux['nomJeu']." : Développé par ".$tabJeux['studioDevJeu']." avec ".$tabJeux['moteurLanguageJeu']." de type ".$tabJeux['typeJeu'].".<br>";
            echo $tabJeux['descriptionJeu']."<br>";
            echo "Sortie prévue sur ".$tabJeux['plateforme']." le ".$tabJeux['dateSortie']."<br>";
            $moyenneReq=mysqli_query($db, "SELECT AVG(noteJeu) FROM note WHERE idJeu=".$tabJeux['idJeu'].";");
            while($tabMoy=mysqli_fetch_array($moyenneReq)) {
                $moyenne=$tabMoy["AVG(noteJeu)"];
            }
            echo "La moyenne des notes reçues par les autres développeurs est de $moyenne/10</p>";

            $notationJeuDev=mysqli_query($db,"SELECT noteJeu FROM note WHERE idDev=$id AND idJeu=".$tabJeux['idJeu'].";");
            $noteOupas=0;
            while($tabNote=mysqli_fetch_array($notationJeuDev)) {
                $noteOupas++;
            }

            if($noteOupas==0) {
                echo "<p class='fixed bottom-0 left-0 right-0 p-4 bg-white border-t border-gray-200'><form method='POST' action='../tempPages/notingGames.php' class='flex items-center space-x-2 bg-white rounded-lg p-2 shadow-md'><label for='rating' class='sr-only'>Noter le jeu</label><input type='number' step=0.1 min='1' max='10' id='rating' name='rating' class='block w-1/4 appearance-none bg-gray-200 border-0 text-gray-500 py-1 px-2 leading-tight focus:outline-none' placeholder='Notez le jeu ".$tabJeux['nomJeu']."'><button type='submit' value ='".$tabJeux['idJeu']."' id='idJeu' name='idJeu'class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none'>Envoyer la note</button></form></p></div><br>";
            }   else {
                echo "<p class='text-xl font-bold text-green-800'>Vous avez déjà noté ce jeu !</p></div><br>";
            }
        }
    }
}
?>
</html>