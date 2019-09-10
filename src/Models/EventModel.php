<?php
namespace MealOclock\Models;

class EventModel extends CoreModel {

    protected static $tableName = 'events';

    private $id;
    private $name;
    private $event_date;
    private $address;
    private $event_limit;
    private $creator_id;
    private $community_id;

    // Crée un nouvel évènement ou le met à jour si il existe déjà
    public static function save() {
        // On crée la requête SQL
        $sql = "
            REPLACE INTO events (
                id,
                name,
                event_date,
                address,
                event_limit,
                creator_id,
                community_id
            ) VALUES (
                :id,
                :name,
                :event_date,
                :address,
                :event_limit,
                :creator_id,
                :community_id
        )";

        // On récupére le connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On execute la requete
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':name', $this->name );
        $stmt->bindValue( ':event_date', $this->event_date );
        $stmt->bindValue( ':address', $this->address );
        $stmt->bindValue( ':event_limit', $this->event_limit );
        $stmt->bindValue( ':creator_id', $this->creator_id );
        $stmt->bindValue( ':community_id', $this->community_id );
        $stmt->bindValue( ':id', $this->id );
        $stmt->execute();

        // On récupére l'ID qui vient d'être généré par MySQL
        $this->id = $conn->lastInsertId();
    }

    /* // Retourne la liste compléte des événements
    public static function findAll() {
        // On construit la requete SQL
        $sql = 'SELECT * FROM events';
        // On récupére la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On execute la requete
        $stmt = $conn->query($sql);
        // On récupére les résultats
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    } */

    /* // Retourne un seul événement à partir de son ID
    public static function find( $id ) {
        // On construit la requête SQL
        $sql = 'SELECT * FROM events WHERE id = :id';
        // On récupère la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':id', $id, \PDO::PARAM_INT );
        $stmt->execute();
        
        // On récupère les résultats
        return $stmt->fetchObject( self::class );
    } */


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of event_date
     */ 
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Set the value of event_date
     *
     * @return  self
     */ 
    public function setEventDate($event_date)
    {
        $this->event_date = $event_date;

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
     * Get the value of event_limit
     */ 
    public function getEventLimit()
    {
        return $this->event_limit;
    }

    /**
     * Set the value of event_limit
     *
     * @return  self
     */ 
    public function setEventLimit($event_limit)
    {
        $this->event_limit = $event_limit;

        return $this;
    }

    /**
     * Get the value of creator_id
     */ 
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Set the value of creator_id
     *
     * @return  self
     */ 
    public function setCreatorId($creator_id)
    {
        $this->creator_id = $creator_id;

        return $this;
    }

    /**
     * Get the value of community_id
     */ 
    public function getCommunityId()
    {
        return $this->community_id;
    }

    /**
     * Set the value of community_id
     *
     * @return  self
     */ 
    public function setCommunityId($community_id)
    {
        $this->community_id = $community_id;

        return $this;
    }
}