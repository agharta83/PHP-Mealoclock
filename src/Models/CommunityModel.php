<?php
namespace MealOclock\Models;

class CommunityModel extends CoreModel {

    protected static $tableName = 'communities';

    protected $id;
    protected $name;
    protected $description;
    protected $picture;
    protected $slug;
    protected $creator_id;

    /* // Retourne la liste de toute les communautés
    public static function findAll() {
        // On construit la requête SQL
        $sql = 'SELECT * FROM communities';
        // On récupère la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On exécute la requête SQL
        $stmt = $conn->query( $sql );
        // On retourne les résultats
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
        return $result;
    } */

    // Retourne une communauté à partir de son "slug"
    public static function findBySlug( $slug ) {
        // On crée la requête SQL
        $sql = 'SELECT * FROM communities WHERE slug = :slug';
        // On récupère la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On exécute la requête
        $stmt = $conn->prepare( $sql );
        $stmt->bindValue( ':slug', $slug, \PDO::PARAM_STR );
        $stmt->execute();

        // On retourne le résultat
        return $stmt->fetchObject( self::class );
    }

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
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of slug
     */ 
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @return  self
     */ 
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }
}