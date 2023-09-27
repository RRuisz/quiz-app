<?php

use Quiz\Quiz;
use User\User;

require_once 'config/config.php';

$requestedMethod = $_SERVER['REQUEST_METHOD'];
$requestURI = explode('?', $_SERVER['REQUEST_URI'])[0];

/**
 * Fix, falls das projekt nicht auf doc_root liegt
 */
if (strpos($requestURI, '/quizapp/') === 0) {
    $requestURI = substr($requestURI, 8);
}

/**
 * cuts of last '/'
 */
if (substr($requestURI, -1) === '/') {
    $requestURI = substr($requestURI, 0, -1);
}

else if($requestURI == "" && $requestedMethod == 'GET') {
    include 'views/home.php';
}

else if($requestURI == "/quiz/new" && $requestedMethod == 'GET'){
    $categories = Quiz::getCategories();
    include 'views/quiz/newquiz.php';
}
else if($requestURI == "/quiz/new" && $requestedMethod == 'POST') {
    Quiz::save($_POST);
}

else if($requestURI == "/register" && $requestedMethod == 'GET'){
    include 'views/auth/register.php';
}
else if($requestURI == "/register" && $requestedMethod == 'POST'){
    User::register($_POST);
}
