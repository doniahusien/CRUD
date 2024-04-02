<?php

$users = json_decode(file_get_contents('users/users.json'), true);

function getUsers()
{
    global $users;
    return $users;
}
function getUserById($id)
{
    global $users;
    $filteredUsers = array_filter($users, fn($user) => $user['id'] == $id);
    return reset($filteredUsers);
    // return $filteredUsers;
}


function updateUser($data, $id)
{
    $updateuser = [];
    global $users;
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateuser = array_merge($user, $data);
        }
    }
    file_put_contents('users/users.json', json_encode($users));
    return $updateuser;
}

function uploadImg($file, $user)
{
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        if (!is_dir('/images')) {
            mkdir('/images');
        }

        $fileName = $file["name"];
        $pos = strpos($fileName, ".");
        $extenstion = substr($fileName, $pos + 1);
        move_uploaded_file($file["tmp_name"], "users/images/{$user['id']}.$extenstion");
        $user['extenstion'] = $extenstion;
        updateUser($user, $user['id']);
    }
}


function createUser($data)
{
    global $users;

    $data['id'] = rand(1000, 2000);

    $users[] = $data;

    file_put_contents('users/users.json', json_encode($users));

    return $data;
}

function delUser($id)
{
    global $users;
    $filteredUsers = array_filter($users, fn($user) => $user['id'] != $id);
    file_put_contents('users/users.json', json_encode($filteredUsers));
    return $filteredUsers;
}

function validateUser($user, &$errors)
{
    $isValid = true;
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Enter your name';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 15) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 15 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'Enter valid email address';
    }

    if (!filter_var($user['phone'], FILTER_VALIDATE_INT)) {
        $isValid = false;
        $errors['phone'] = 'Enter valid phone number';
    }

    return $isValid;
}
