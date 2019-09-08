<?php
namespace MealOclock\Controllers;

class CoreController {
    // Instance de la librairie Plates pour gérer les templates
    $this->templates = new \League\Plates\Engine( __DIR__ . '/../Views');
}