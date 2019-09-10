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
        $errors = [];

        // On regarde si on a validé le formulaire
        if(!empty($_POST)) {
            // On a bien des données, on essaie d'identifier l'utilisateur grâce à son email
            $email = $_POST['email'];
            $member = \MealOclock\Models\MemberModel::findByEmail($email);

            if($member === false) {
                // Aucun membre ne possède cette adresse mail
                $errors[] = "Utilisateur inconnu";
            } else {
                // L'adresse mail existe bien, on doit maintenant tester le mot de passe
                $hash = $member->getPassword();
                $isValid = password_verify($_POST['password'], $hash);

                if( $isValid === false) {
                    // Ce n'est pas le bon mot de passe
                    $errors[] = "Mot de passe incorrect";
                } else {
                    // C'est le bon mot de passe, on identifie l'utilisateur, on identifie l'utilisateur
                    \MealOclock\Models\MemberModel::login($member);
                    // On redirige l'utilisateur
                    $this->redirect('home');
                }
            }
        }

        echo $this->templates->render('member/login', [
            'errors' => $errors,
            'fields' => $_POST
        ]);
    }
} 