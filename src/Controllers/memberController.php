<?php

namespace MealOclock\Controllers;

class MemberController extends CoreController {
    
    // Création de compte
    public function signup() {

        $errors = [];

        // On regarde si on reçoit les informations
        if(!empty($_POST)) {
            // On a validé le formulaire, le visiteur souhaite créer un compte
            //var_dump($_POST);

            // On vérifie les données du formulaire
            $errors = \MealOclock\Models\MemberModel::checkData( $_POST );

            // On regarde si il y a des erreurs
            if(empty($errors)) {
                // Pas d'erreur, on peut continuer la création de compte
                $member = \MealOclock\Models\MemberModel::signup($_POST);
                // On redirige l'utilisateur sur le formulaire de connexion
                $this->redirect('login');
            }
        }

        // On affiche le formulaire
        echo $this->templates->render( 'member/signup', [
            'errors' => $errors,
            'fields' => $_POST
        ]);
    }

    // Connexion
    public function login() {
        echo $this->templates->render('member/login');
    }
} 