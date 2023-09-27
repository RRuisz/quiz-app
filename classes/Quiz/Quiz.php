<?php

namespace Quiz;
class Quiz
{


    /**
     * Saves a new Quiz to the DB
     * param $data
     *
     */
    public static function saveQuiz($data)
    {
        var_dump($data);
        $category = (int)$data['category'];
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'INSERT INTO `quiz`(`name`, `category_id`) VALUES (?, ?)';
        $stmt = $pdo->prepare($query);
        $stmt->execute([$data['name'], (int)$data['category']]);


    }

    /**
     * Converts the data to an JSON output
     * API for quiz and category
     * @return json
     */
    public static function api()
    {
        $pdo = new \PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'SELECT quiz.*, categories.name AS category_name FROM quiz INNER JOIN categories ON quiz.category_id = categories.id;';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        header('Content-Type: application/json');


        echo json_encode($result);
    }
}