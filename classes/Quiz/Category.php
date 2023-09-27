<?php

namespace Quiz;

class Category
{

    public static function api()
    {
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'SELECT * FROM `categories`';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        header('Content-Type: application/json');

        // JSON-Formatierung und Ausgabe
        echo json_encode($result);
    }

    /**
     * TODO: Brauch ich das noch? Kann ich doch eh über die API machen oder??
     * @return array
     */
    public static function all() :array
    {
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'SELECT * FROM `categories`';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();

    }
}