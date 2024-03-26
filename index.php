<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - IndieGameForge</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-2xl">
            <h1 class="text-4xl font-bold text-center text-blue-500">Bienvenue sur IndieGameForge!</h1>
        </div>
    </div>
    <div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 mt-4 bg-white rounded-xl shadow-md">
            <h3 class="text-2xl font-bold text-center mb-6">Connexion</h3>
            <form method="POST">
                <div class="mb-4">
                    <label for="pseudo" class="block text-gray-700 font-bold mb-2">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Entez votre pseudo" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe" class="appearance-none border rounded-md w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" required>
                    <p class="text-red-500 text-xs italic">Entrez un mot de passe, svp.</p>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Se connecter</button>
                    <a class="inline-block align-baseline text-sm text-blue-500 hover:text-blue-800" href="inscription.php">S'inscrire</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>