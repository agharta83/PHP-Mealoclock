<?php

namespace MealOclock\Controllers\Admin;

class CommunityController extends CoreController {
    
    public function delete($params) {
        // On récupére l'identifiant de la communauté
        $id = $params['id'];
        // on supprime la communauté
        $community = \MealOclock\Models\CommunityModel::find($id);
        $community->delete();
        // On redirige l'utilisateur
        $this->redirect('admin');
    }
}