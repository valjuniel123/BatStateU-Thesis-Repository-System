<?php

include('../models/database.php');
include('../models/loginRegister.php');

$loginRegister = new LoginRegister();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $loginRegister->login($email, $password);
}

if (isset($_POST['register'])) {
    $data = array(
        'srCode'        =>     $_POST['srCode'],
        'email'         =>     $_POST['email'],
        'password'      =>     $_POST['password'],
        'firstName'     =>     $_POST['firstName'],
        'middleName'    =>     isset($_POST['middleName']) ? $_POST['middleName'] : '',
        'lastName'      =>     $_POST['lastName'],
        'department'    =>     $_POST['department'],
        'campus'        =>     $_POST['campus'],
    );

    echo $loginRegister->register($data);
}

if (isset($_POST['verify'])) {
    $tokenKey = $_POST['tokenKey'];
    $srCode = $_POST['srCode'];

    echo $loginRegister->verify($tokenKey, $srCode);
}

if (isset($_POST['forgotPass'])) {
    $email = $_POST['email'];

    echo $loginRegister->resetPassword($email);
}
