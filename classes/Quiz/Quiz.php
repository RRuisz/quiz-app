<?php

namespace Quiz;
class Quiz
{

    public static function getCategories() :array
    {
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'SELECT * FROM `categories`';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function save($data)
    {
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
    }
}