<?php

namespace MealOclock\Controllers;

class MemberController extends CoreController {
    
    public function signup() {
        // On regarde si on reçoit les informations
        if(!empty($_POST)) {
            // On a validé le formulaire, le visiteur souhaite créer un compte
            var_dump($_POST);

            // On vérifie les données du formulaire
            $errors = \MealOclock\Models\MemberModel::checkData( $_POST );
        }

        // On affiche le formulaire
        echo $this->templates->render( 'member/signup' );
    }
}