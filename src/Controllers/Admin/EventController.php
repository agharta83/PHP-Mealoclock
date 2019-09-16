<?php

namespace MealOclock\Controllers\Admin;

class EventController extends CoreController {
    
    // Affiche la liste des evenements
    public function list() {
        // On récupére la liste des evenments
        $list= \MealOclock\Models\EventModel::findAll();
        // Affiche le template
        echo $this->templates->render('admin/event/list', ['events' => $list]);
    }

    // Supression d'un evenement
    public function delete ($params) {
        $id = $params['id'];
        // On supprime l'evenement
        $event = \MealOclock\Models\EventModel::find($id);
        $event->delete();
        // On redirige l'utilisateur
        $this->redirect('admin_events');
    }
}