<?php
namespace MealOclock\Controllers;

class CoreController {

    public function __construct($router) {
        // Test connexion BDD
        //$connexion = \MealOclock\Database::getDb();

        // On enregistre le routeur dans le controller
        $this->router = $router;
        
        // Instance de la librairie Plates pour gérer les templates
        $this->templates = new \League\Plates\Engine( __DIR__ . '/../Views' );

        // Ajout de données globales grâce à la méthode addData() de Plates
        $this->templates->addData([
            'basePath' => $_SERVER['BASE_URI'],
            'router' => $this->router
        ]);
    }

    // Permet de faire une redirection
    public function redirect ($routeName, $infos = []) {
        header('Location: ' . $this->router->generate($routeName, $infos));
        exit();
    }
}