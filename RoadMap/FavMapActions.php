<?php
include_once "../config/services.php";
session_start();
$MapID = $_GET["id"];
$action = $_GET["act"];
$User = $_SESSION["user"];

if ($action == "add"){
    $new_str = '';
    for ($i = 0; $i < count($User->FavMapsIDS); $i++){
        $new_str .= (string)$User->FavMapsIDS[$i];
        $new_str .= "/";
    }
    $new_str .= (string)$MapID . "/";
    UserDB::ChangeFavMaps($User->ID, $new_str);
    array_push($_SESSION["user"]->FavMapsIDS, $MapID);
    header('Location: main.php?id=' . $MapID);
}
else{
    $new_str = '';
    $new_arr = [];
    for ($i = 0; $i < count($User->FavMapsIDS); $i++){
        if($User->FavMapsIDS[$i] != $MapID){
            $new_str .= $User->FavMapsIDS[$i];
            array_push($new_arr, $User->FavMapsIDS[$i]);
            $new_str .= "/";
        }
    }
    UserDB::ChangeFavMaps($User->ID, $new_str);
    $_SESSION["user"]->FavMapsIDS = $new_arr;
    header('Location: main.php?id=' . $MapID);
}