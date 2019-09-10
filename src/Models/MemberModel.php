<?php
namespace MealOclock\Models;

class MemberModel {
    
    private $id;
    private $email;
    private $password;
    private $firstname;
    private $lastname;
    private $photo;
    private $address;
    private $description;
    private $is_admin;

    // Vérification des données de création de compte, liste les erreurs détectées
    public static function checkData ($data) {
        // Va contenir la liste des erreurs
        $errors = [];

        // On vérifie tous les champs obligatoires
        // Liste des champs obligatoires
        $mandatoryFields = [
            'email' => "Veuillez saisir une adresse mail",
            'password' => "Veuillez renseigner un mot de passe",
            'password_confirm' => "Vous avez oublié de confirmer le mot de passe",
            'firstname' => "Veuillez saisir un prénom",
            'lastname' => "Veuillez saisir un nom",
        ];

        foreach ($mandatoryFields as $fieldName => $msg) {
            // On vérifie tous les champs obligatoires
            if( empty($data[ $fieldName ])) {
                // Erreur, le champ est vide !
                $errors[] = $msg;
            }
        }

        return $errors;
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of is_admin
     */ 
    public function getIs_admin()
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin
     *
     * @return  self
     */ 
    public function setIs_admin($is_admin)
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}