<?php

    session_start();
    include_once("../data/UserDB.php");

    $nickname = $_POST["nickname"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password === $confirm_password){
        UserDB::AddNewUser($nickname, $login, $password);

        $_SESSION["message"] = "Регистрация прошла успешно";
        header('Location: SignInPage.php');
    }
    else{
        $_SESSION["message"] = "Пароли не совпадают";
        header('Location: Register.php');
    }
?>