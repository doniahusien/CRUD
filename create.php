<?php
require ('./partials/header.php');
include "./users/users.php";

$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];


$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];

$isValid = true;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = array_merge($user, $_POST);
    $isValid = validateUser($user, $errors);

    if ($isValid) {
        $user = createUser($_POST);
        uploadImg($_FILES['image'], $user);
        header('Location: index.php');
    }
}



include './partials/form.php';
include './partials/footer.php';
?>