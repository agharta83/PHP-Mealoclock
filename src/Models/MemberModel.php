<?php
namespace MealOclock\Models;

class MemberModel extends CoreModel {

    protected static $tableName = 'members';
    
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

        // On vérifie la double saisie du mot de passe
        if($data['password'] !== $data['password_confirm']) {
            $errors[] = "Confirmation du mot de passe incorrecte";
        }

        // On vérifie le format de l'email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Votre adresse mail n'est pas au bon format";
        }

        return $errors;
    }

    // Inscription d'un membre
    public static function signup($data) {
        // On crée un objet vierge
        $member = new self();

        // On renseigne les informations
        $member->setEmail($data['email']);
        $member->setPassword($data['password']);
        $member->setFirstname($data['firstname']);
        $member->setLastname($data['lastname']);
        $member->setAddress($data['address']);
        $member->setDescription($data['description']);

        // On enregistre le nouveau compte
        $member->save();

        return $member;
    }

    // Crée un nouveau membre ou le met
    // à jour si il existe déjà
    public function save() {
        // On crée la requête SQL
        $sql = "
            REPLACE INTO members (
                id,
                email,
                password,
                firstname,
                lastname,
                address,
                description
            )
            VALUES (
                :id,
                :email,
                :password,
                :firstname,
                :lastname,
                :address,
                :description
            )";
        // On récupère la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $this->id );
        $stmt->bindValue( ':email', $this->email );
        $stmt->bindValue( ':password', $this->password );
        $stmt->bindValue( ':firstname', $this->firstname );
        $stmt->bindValue( ':lastname', $this->lastname );
        $stmt->bindValue( ':address', $this->address );
        $stmt->bindValue( ':description', $this->description );
        $stmt->execute();
        // On affiche les erreurs pour debug
        // var_dump( $conn->errorInfo() );exit();
        // On récupère l'ID qui vient d'être généré par MySQL
        $this->id = $conn->lastInsertId();
    }

    // Retourne l'utilisateur associé à une adresse mail
    public static function findByEmail($email) {
        // On construit la requete SQL
        $sql = 'SELECT * FROM members WHERE email LIKE :email';
        // On récupére la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On execute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();
        // On retourne le résultat
        return $stmt->fetchObject( self::class );
    }

    // Inscrit les informations de l'utilisateur en session
    public static function login($member) {
        $_SESSION['user'] = [
            'id' => $member->getId(),
            'email' => $member->getEmail(),
            'firstname' => $member->getFirstname(),
            'photo' => $member->getPhoto(),
            'is_admin' => (bool) $member->getIs_admin()
        ];
    }

    // Retourne les informations de l'utilisateur connecté
    public static function getUser() {
        if(!empty($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return false;
    }

    // Retourne le prénom et le nom formatés
    public function getName() {
        return ucfirst($this->firstname) . ' ' . strtoupper($this->lastname);
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
        $this->password = password_hash($password, PASSWORD_DEFAULT);

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