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
        $event->setName('trololo');
        $event->save();
        // On affiche le template
        echo $this->templates->render( 'event/read', ['event' =>$event] );
    }

    // Création d'un evenement 
    // Methode GET (on demande l'affichage du formulaire de création d'évenement) et POST (on reçoit les informations de création)
    public function create() {
        if (!empty( $_POST )) {
            // On a reçu les informatins de création d'un événement, on le créé
            //var_dump($_POST);
            $event = new \MealOclock\Models\EventModel();
            $event->setName( $_POST['name']);
            $event->setEventDate( $_POST['event_date']);
            $event->setAddress( $_POST['address']);
            $event->setEventLimit( $_POST['event_limit']);
            $event->setCreatorId( 1 );
            $event->setCommunityId( 1 );
            $event->save();

            // L'événement est correctement créé, on redirige l'utilisateur sur la page de l'évènement
            header('Location: ' . $this->router->generate( 'event_read', [ 'id' => $event->getId() ] ));
        } else {
            // Aucune information dans $_POST, on affiche le template
            echo $this->templates->render ('event/create');
        }
    }
}