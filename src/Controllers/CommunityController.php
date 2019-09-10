<?php
namespace MealOclock\Controllers;

class CommunityController extends CoreController {
    
    public function read($params) {
        // On récupére l'information qui nous permet de savoir quelle est la communauté à afficher 
        //var_dump($params); die();
        $slug = $params['slug'];

        // On fait une requete pour récupérer les informations de la communauté
        $community = \MealOclock\Models\CommunityModel::findBySlug($slug);
        
        // On affiche le template d'une communauté
        echo $this->templates->render('community/read', ['community' => $community]);
    }
}   