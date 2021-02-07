<?php
include_once "../config/services.php";
session_start();
$NewRoadMap = $_SESSION["new_roadmap"];

$NewID = $NewRoadMap->GetLastNodeID() + 1;
$ParentID = $_GET["parid"];
$MapID = $_GET["id"];

if ($_POST["Name"] == ''){
    $_SESSION["system_message"] = "Введите название карты";
    header('Location: layerPage.php?id=' . $NewRoadMap->ID. '&parid=' . $ParentID);
    exit;
}

if ($_POST["LongDesc"] == ''){
    $_SESSION["system_message"] = "Введите длинное описание";
    header('Location: layerPage.php?id=' . $NewRoadMap->ID. '&parid=' . $ParentID);
    exit;
}

if ($_POST["Type"] == "0"){
    $Type = "m";
}
elseif ($_POST["Type"] == "1"){
    $Type = "e";
}
else{
    $_SESSION["system_message"] = "Неверное значение типа пункта";
    header('Location: layerPage.php?id=' . $NewRoadMap->ID. '&parid=' . $ParentID);
    exit;
}

$NewNode = new RoadMapNode($NewID, $ParentID, $MapID, $Type, $_POST["Name"], $_POST["LongDesc"]);
array_push($_SESSION["new_roadmap"]->Nodes, $NewNode);
header('Location: layerPage.php?id=' . $NewRoadMap->ID. '&parid=' . $ParentID);