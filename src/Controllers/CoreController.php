<?php
namespace MealOclock\Controllers;

class CoreController {

    public function __construct() {
        // Instance de la librairie Plates pour gérer les templates
        $this->templates = new \League\Plates\Engine( __DIR__ . '/../Views' );

        // Ajout de données globales grâce à la méthode addData() de Plates
        $this->templates->addData([
            'basePath' => $_SERVER['BASE_URI']
        ]);
    }
}