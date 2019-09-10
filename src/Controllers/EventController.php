<?php
namespace MealOclock\Controllers;

class EventController extends CoreController {
    
    public function list() {
        // On récupére la liste des évènements à partir de la BDD
        $list = \MealOclock\Models\EventModel::findAll();
        // On affiche le template
        echo $this->templates->render( 'event/list', ['events' => $list] );
    }

    public function read($params) {
        // On récupère l'id de l'événement à afficher
        $eventId = $params['id'];
        // On récupére les données de l'événement à partir de la BDD
        $event = \MealOclock\Models\EventModel::find( $eventId );
        // On affiche le template
        echo $this->templates->render( 'event/read', ['event' =>$event] );
    }
}