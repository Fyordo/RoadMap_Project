<?php
include_once "../config/services.php";
session_start();
$MapID = $_GET["id"];
$action = $_GET["act"];
$User = $_SESSION["user"];

if ($action == "add"){
    UserDB::AddFavMap($User->ID, $MapID);
    array_push($_SESSION["user"]->FavMapsIDS, $MapID);
    header('Location: main.php?id=' . $MapID);
}
else{
    $new_arr = [];
    for ($i = 0; $i < count($User->FavMapsIDS); $i++){
        if($User->FavMapsIDS[$i] != $MapID){
            array_push($new_arr, $User->FavMapsIDS[$i]);
        }
    }
    UserDB::DeleteFavMap($User->ID, $MapID);
    $_SESSION["user"]->FavMapsIDS = $new_arr;
    header('Location: main.php?id=' . $MapID);
}