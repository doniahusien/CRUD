<?php
include './partials/header.php';
require('./users/users.php');

$userId = $_GET['id'];
$user = getUserById($userId);

if(!isset($user)|| !isset($_GET['id'])){
    header('Location: ../partials/notFound.php');
}

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];


if ($_SERVER['REQUEST_METHOD'] == "POST") {
$user = array_merge($user, $_POST);
    $isValid = validateUser($user, $errors);
    if ($isValid) {
        
        $userupdate = updateUser($_POST, $userId);
        uploadImg($_FILES['image'], $userupdate);
        header('Location: index.php');
    }
}

include './partials/form.php';
include './partials/footer.php';
