<?php
session_start();
//Récupération des données utilisateur
$pseudo=$_SESSION['pseudo'];
$id=$_SESSION['id'];

//Récupération des données du formulaire
$titre=$_POST['titre'];
?>