<?php

error_reporting(E_ALL);

// Chargement des fichiers de façon dynamique
require(__DIR__ . '/vendor/autoload.php');

// FrontController
$app = new MealOclock\Application();

// Liste de routes
$app->initRoutes();

// Matching des routes ($match)
$app->matching();