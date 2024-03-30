<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Modifier le jeu - IndieGameForge</title>
</head>
<body>
<nav class="flex items-center justify-center bg-blue-500 text-white py-4" aria-label="Main navigation">
        <ul class="flex space-x-4">
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userCreateGames.html">Créer son jeu</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="userGames.php">Consulter ses jeux</a>
          </li>
          <li>
            <a class="hover:bg-blue-700 hover:text-white px-3 py-2 rounded-md font-medium text-sm" href="allGames.php">Consulter les autres jeux</a>
          </li>
        </ul>
      </nav>

      <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl">
            <h1 class="text-4xl font-bold text-center text-blue-500">Quoi ? Votre jeu n'a pas les bonnes informations ? Changeons ça immédiatement !</h1>
        </div>
    </div>
    <div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 mt-4 bg-white rounded-xl shadow-md">
            <h3 class="text-2xl font-bold text-center mb-6">Modification des informations du jeu publié</h3>
            <?php
            session_start();
            $db=mysqli_connect("localhost","root","","indiegameforge");

            if(!$db) {
                echo "<p class='text-red-500 underline text-2xl font-bold'>Erreur de connexion à la base de données !</p>";
                header("Refresh:3");
            }   else {
                $_SESSION['idMod']=$_POST["idJeu"];

                $recupJeu=mysqli_query($db,"SELECT * FROM jeu WHERE idJeu=".$_SESSION['idMod'].";");
                while($jeu=mysqli_fetch_array($recupJeu)) {
                    $titre=$jeu['nomJeu'];
                    $type=$jeu['type'];
                    $studio=$jeu['studioDevJeu'];
                    $description=$jeu['descriptionJeu'];
                    $moteur=$jeu['moteurLanguageJeu'];
                    $plateforme=$jeu['plateforme'];
                    $sortie=$jeu['dateSortie'];
                }
                $iddev=$_SESSION['id'];
            }
            ?>
</body>
</html>