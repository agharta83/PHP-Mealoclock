<?php

namespace MealOclock;

class Application {
    
    // Instanciation du router
    public function __construct() {
        $this->router = new \AltoRouter();
        $this->router->setBasePath( $_SERVER['BASE_URI'] );
    }

    // Indique les différentes URL de l'application dans l'objet Altorouter
    public function initRoutes() {
        // Home
        $this->router->map('GET', '/', ['MainController', 'home'], 'home');
    }

    // Exécute le controller et la méthode correspondants à l'URL demandée
    public function matching() {
        // On demande à Altorouter si il connait l'URL qui est demandée par le navigateur
        $match = $this->router->match();

        if (!$match) {
            // Altorouter n'a pas trouvé la route, on doit afficher une erreur
            die('Route inconnue');
        }
        else {
            // Altorouter a bien trouvé la route correspondante, on récupère infos
            $data = $match['target'];
            $controllerName = '\MealOclock\Controllers\\' . $data[0];
            $methodName = $data[1];
            // On instancie le controller
            $controller = new $controllerName();
            // On exécute la méthode
            $controller->$methodName(  );
        }
    }
}