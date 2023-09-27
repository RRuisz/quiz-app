<?php

namespace User;

use PDO;

class User
{
    public string $name;
    public string $username;
    protected string $password;
    public string $email;
    public int $role_id;

    public static function register(array $data)
    {
        $validation = true;
        $error = [];


        $checkUsername = new PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
        $query = 'SELECT COUNT(*) FROM `users` WHERE `username` = :username';
        $stmt = $checkUsername->prepare($query);
        $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0 || !isset($data['username']) || strlen($data['username']) <= 5) {
            $validation = false;
            $error = ['username' => 'Username muss länger als 5 Zeichen lang sein, oder ist schon vorhanden!'];
        }


        if (!isset($data['pwd']) || strlen($data['pwd']) <= 7) {
            $validation = false;
            $error = ['pwd' => 'Das Passwort muss mind. 7 Zeichen lang sein!'];
        } else {

            $pwd = password_hash($data['pwd'], PASSWORD_DEFAULT);
        }


        if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $error = ['email' => 'Bitte eine korrekte E-Mail Adresse angeben!'];
        }


        if ($validation) {
            $pdo = new PDO('mysql:host=' . DB['host'] . ';dbname=' . DB['db'], DB['user'], DB['pwd']);
            $query = 'INSERT INTO `users`(`username`, `email`, `password`) VALUES (?, ?, ?)';
            $stmt = $pdo->prepare($query);
            $result = $stmt->execute([$data['username'], $data['email'], $pwd]);
        } else {
            session_start();
            $_SESSION['error'] = $error;
            header('location:' .BASE_URL.'/register');
        }
    }
}