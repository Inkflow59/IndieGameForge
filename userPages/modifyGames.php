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
                    $type=$jeu['typeJeu'];
                    $studio=$jeu['studioDevJeu'];
                    $description=$jeu['descriptionJeu'];
                    $moteur=$jeu['moteurLanguageJeu'];
                    $plateforme=$jeu['plateforme'];
                    $sortie=$jeu['dateSortie'];
                }
                $iddev=$_SESSION['id'];

                //Suppression des précedentes données de formulaire
                if(isset($_POST['titre'])) {
                  unset($_POST['titre']);
                }
                if(isset($_POST['type'])) {
                    unset($_POST['type']);
                }
                if(isset($_POST['studio'])) {
                    unset($_POST['studio']);
                }
                if(isset($_POST['description'])) {
                    unset($_POST['description']);
                }
                if(isset($_POST['moteur'])) {
                    unset($_POST['moteur']);
                }
                if(isset($_POST['plateforme'])) {
                    unset($_POST['plateforme']);
                }
                if(isset($_POST['sortie'])) {
                    unset($_POST['sortie']);
                }

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='titre' class='block text-gray-700 font-bold mb-2'>Titre du jeu</label>
                <input type='text' name='titre' id='titre' placeholder='".mysqli_real_escape_string($db,$titre)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le titre du jeu</button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='type' class='block text-gray-700 font-bold mb-2'>Type du jeu</label>
                <input type='text' name='type' id='type' placeholder='".mysqli_real_escape_string($db,$type)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le type du jeu</button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='studio' class='block text-gray-700 font-bold mb-2'>Développeur(s) du jeu</label>
                <input type='text' name='studio' id='studio' placeholder='".mysqli_real_escape_string($db,$studio)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le(s) développeur(s) du jeu</button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='description' class='block text-gray-700 font-bold mb-2'>Description du jeu</label>
                <input type='text' name='description' id='description' placeholder='".mysqli_real_escape_string($db,$description)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier la description du jeu</button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='moteur' class='block text-gray-700 font-bold mb-2'>Language(s) et/ou moteur du jeu</label>
                <input type='text' name='moteur' id='moteur' placeholder='".mysqli_real_escape_string($db,$moteur)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le(s) language(s) et/ou le moteur du jeu</button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='plateforme' class='block text-gray-700 font-bold mb-2'>Plateforme(s) de sortie du jeu</label>
                <input type='text' name='plateforme' id='plateforme' placeholder='".mysqli_real_escape_string($db,$plateforme)."' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier la(les) plateforme(s) du jeu/button></form></div>";

                echo "<form method='POST' action='../tempPages/updateGame.php'>
                <div class='mb-4'>
                <label for='sortie' class='block text-gray-700 font-bold mb-2'>Date de sortie du jeu (celle déjà inscrite : $sortie)</label>
                <input type='date' name='sortie' id='sortie' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier la date de sortie du jeu</button></form></div>";
            }
            ?>
</body>
</html>