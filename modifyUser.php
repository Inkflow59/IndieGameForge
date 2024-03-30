<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Modifier le développeur - IndieGameForge</title>
</head>
<body class="bg-gray-100">
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

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl">
            <h1 class="text-4xl font-bold text-center text-blue-500">Une erreur ? Modifiez vos informations personnelles !</h1>
        </div>
    </div>
    <div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 mt-4 bg-white rounded-xl shadow-md">
            <h3 class="text-2xl font-bold text-center mb-6">Modification des informations</h3>
            <?php
            session_start();
            $id=$_SESSION["id"];

            $db=mysqli_connect("localhost","root","","indiegameforge");

            if(!$db) {
                echo "<p class='text-red-500 underline text-2xl font-bold'>Erreur de connexion à la base de données !</p>";
                header("Refresh:3");
            }   else {
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
                if(isset($_POST['birth'])) {
                    unset($_POST['birth']);
                }
                if(isset($_POST['start'])) {
                    unset($_POST['start']);
                }
                if(isset($_POST['pays'])) {
                    unset($_POST['pays']);
                }
                if(isset($_POST['mdp'])) {
                    unset($_POST['mdp']);
                }

                $recupUser=mysqli_query($db,"SELECT * FROM developpeur WHERE idDev=$id;");
                while($infos=mysqli_fetch_array($recupUser)) {
                    $nom=$infos['nomDev'];
                    $prenom=$infos['prenomDev'];
                    $pays=$infos['paysDev'];
                    $start=$infos['anneeDebutDev'];
                    $birth=$infos['dateNaissance'];
                    $pseudo=$infos['username'];
                    $mdp=$infos['password'];
                }

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-4'>
                <label for='prenom' class='block text-gray-700 font-bold mb-2'>Prénom</label>
                <input type='text' name='prenom' id='prenom' placeholder='$prenom' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le prénom</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='nom' class='block text-gray-700 font-bold mb-2'>Nom de famille</label>
                <input type='text' name='nom' id='nom' placeholder='$nom' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le nom</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='pays' class='block text-gray-700 font-bold mb-2'>Pays natal</label>
                <input type='text' name='pays' id='pays' placeholder='$pays' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le pays</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='start' class='block text-gray-700 font-bold mb-2'>Année de début de développement</label>
                <input type='text' name='start' id='start' placeholder='$start' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier l'année de début de développement</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='birth' class='block text-gray-700 font-bold mb-2'>Date de naissance (celle déjà inscrite : $birth)</label>
                <input type='date' name='birth' id='birth' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier la date de naissance</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='pseudo' class='block text-gray-700 font-bold mb-2'>Pseudo</label>
                <input type='text' name='pseudo' id='pseudo' placeholder='$pseudo' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le pseudo</button></form></div>";

                echo "<form method='POST' action='tempPages/updateDev.php'>
                <div class='mb-6'>
                <label for='mdp' class='block text-gray-700 font-bold mb-2'>Mot de passe</label>
                <input type='text' name='mdp' id='mdp' placeholder='$mdp' class='appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500' required>
                <button type='submit' class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-md focus:outline-none mt-3'>Modifier le mot de passe</button></form></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>