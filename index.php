<?php

error_reporting(E_ALL);

// On démarre les sessions pour pouvoir stocker les informations de compte
session_start();

// Chargement des fichiers de façon dynamique
require(__DIR__ . '/vendor/autoload.php');

// FrontController
$app = new MealOclock\Application();

// Liste de routes
$app->initRoutes();

// Matching des routes ($match)
$app->matching();