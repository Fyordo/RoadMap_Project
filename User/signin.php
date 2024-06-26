<?php

include_once dirname(__FILE__)."/../models/User.php";
session_start();
include_once dirname(__FILE__)."/../data/UserDB.php";

$login = $_POST["login"];
$password = $_POST["password"];

if ((bool)UserDB::LoginExists($login)) {
    if ((bool)UserDB::IsSignedUp($login, $password)) {
        
        $_SESSION["message"] = "Вы вошли в аккаунт";

        $user = UserDB::GetUserDataByLogin($login);

        $_SESSION['user'] = $user;

        header('Location: ../Profile.php');
    } else {
        $_SESSION["message"] = "Неверный пароль";
        header('Location: SignInPage.php');
    }
} else {
    $_SESSION["message"] = "Неверный логин";
    header('Location: SignInPage.php');
}
