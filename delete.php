<?php

include "./users/users.php";
$users = delUser( $_POST['id']);
header("Location: index.php");
