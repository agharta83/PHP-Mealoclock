<?php

namespace MealOclock;

use CommunityController;

class Application {
    
    // Instanciation du router
    public function __construct() {
        $this->router = new \AltoRouter();
        $this->router->setBasePath( $_SERVER['BASE_URI'] );
    }

    // Indique les différentes URL de l'application dans l'objet Altorouter
    public function initRoutes() {
        // MainController
        $this->router->map('GET', '/', ['MainController', 'home'], 'home');
        $this->router->map('GET', '/cgu', ['MainController', 'cgu'], 'cgu');
        $this->router->map('GET', '/pages/mentions', ['mainController', 'mentions'], 'mentions');

        // Communautés
        $this->router->map('GET', '/communities/[:slug]', ['CommunityController', 'read'], 'community_read');

        // Evènements
        $this->router->map('GET', '/events', ['EventController', 'list'], 'event_list');
        $this->router->map('GET', '/events/[i:id]', ['EventController', 'read'], 'event_read');
        $this->router->map('GET|POST', '/events/create', ['EventController', 'create'], 'event_create');
        //$this->router->map('GET', '/[admin|profile:domain]events/[i:id]/update', ['EventController', 'update'], 'event_update');

        // Membres
        $this->router->map('GET', '/members', ['MemberController', 'list'], 'member_list');

        // Administration
        // $this->router->map('GET', '/admin/communities', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/communities/create', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/communities/[i:id]/update', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/communities/[i:id]/delete', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/events', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/members', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/members/update/status', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/members/[i:id]/delete', ['AdminController', ''], '');
        // $this->router->map('GET', '/admin/members/update/role', ['AdminController', ''], '');

        // Connexion / inscription
        $this->router->map('GET|POST', '/signup', ['MemberController', 'signup'], 'signup');
        $this->router->map('GET|POST', '/login', ['MemberController', 'login'], 'login');
        $this->router->map('GET', '/logout', ['MemberController', 'logout'], 'logout');
        // $this->router->map('GET', '/forgot_password', ['MemberController', ''], '');
        // $this->router->map('GET', '/update_password', ['MemberController', ''], '');

        // Compte utilisateur
        $this->router->map('GET', '/profile', ['MemberController', 'me'], 'profile');
        // $this->router->map('GET', '/profile/update', ['Controller', ''], '');
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
            $controller = new $controllerName( $this->router );
            // On exécute la méthode
            $controller->$methodName( $match['params'] );
        }
    }
}