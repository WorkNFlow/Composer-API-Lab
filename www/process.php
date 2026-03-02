<?php
session_start();

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email'] ?? '');

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;

$errors = [];
if(empty($name)) $errors[] = "Имя не может быть пустым";
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Некорректный email";

if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php");
    exit();
}

require_once 'ApiClient.php';
$api = new ApiClient();

$url = 'https://api.tvmaze.com/shows';
$apiData = $api->request($url);

$_SESSION['api_data'] = $apiData;


$line = $name . ";" . $email . "\n";
file_put_contents("data.txt", $line, FILE_APPEND);

header("Location: index.php");
exit();


