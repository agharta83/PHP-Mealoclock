<?php

namespace MealOclock\Models;

class CoreModel {

    protected static $tableName;
    
    // Retourne la liste de toutes les communautés
    public static function findAll() {
        // On construit la requête SQL
        $sql = 'SELECT * FROM '.static::$tableName;
        // On récupère la connexion à la BDD
        $conn = \MealOclock\Database::getDb();
        // On exécute la requête SQL
        $stmt = $conn->query( $sql );
        // On retourne les résultats
        return $stmt->fetchAll(\PDO::FETCH_CLASS, static::class);
    }
}
