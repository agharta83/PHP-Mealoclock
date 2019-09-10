<?php
namespace MealOclock\Controllers;

class EventController extends CoreController {
    
    public function list() {
        // On affiche le template
        echo $this->templates->render( 'event/list' );
    }

    public function read($params) {
        // On récupère l'id de l'événement à afficher
        $eventId = $params['id'];
        // On affiche le template
        echo $this->templates->render('event/read', ['id' =>$eventId]);
    }
}