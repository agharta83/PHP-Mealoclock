<?php

namespace MealOclock\Controllers;

class AdminController extends CoreController {
    
    // Page d'accueil de l'interface d'admin
    public function home() {
        // On récupére la liste des communautés
        $list = \MealOclock\Models\CommunityModel::findAll();
        // On affiche le template
        echo $this->templates->render('admin/home', ['communities' => $list]);
    }
}