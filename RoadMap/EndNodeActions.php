<?php
include_once "../config/services.php";
session_start();
$MapID = $_GET["id"];
$RoadMap = RoadMaps::GetRoadMapByID($MapID);

$NodeID = $_GET["parid"];

$action = $_GET["act"];

$User = $_SESSION["user"];

if ($action == "add"){
    $new_arr = [];
    array_push($_SESSION["user"]->CompletedNodes, $NodeID);
    array_push($new_arr, $NodeID);

    // Проверяем все слои выше на то, пройдены ли они begin

    $NodeParent = $RoadMap->GetNodeByID($RoadMap->GetNodeByID($NodeID)->ParentID);

    while ($NodeParent->Type != "b"){
        if ($RoadMap->ChildrenCompleted($NodeParent->ID, $User->CompletedNodes)){
            array_push($_SESSION["user"]->CompletedNodes, $NodeParent->ID);
            array_push($new_arr, $NodeParent->ID);
            $NodeParent = $RoadMap->GetNodeByID($RoadMap->GetNodeByID($NodeParent->ID)->ParentID);
        }
        else{
            break;
        }
    }

    // Проверяем все слои выше на то, пройдены ли они end

    UserDB::AddCompletedNodes($User->ID, $new_arr);
    header('Location: endnode.php?id=' . $MapID . '&parid=' . $NodeID);
}
else{
    $erase = $RoadMap->GetParentsIDS($NodeID);
    array_push($erase, $NodeID);

    $new_arr = [];
    for ($i = 0; $i < count($User->CompletedNodes); $i++){
        if(!in_array($User->CompletedNodes[$i], $erase)){
            array_push($new_arr, $User->CompletedNodes[$i]);
        }
    }

    UserDB::DeleteCompletedNodes($User->ID, array_diff($User->CompletedNodes, $new_arr));
    $_SESSION["user"]->CompletedNodes = $new_arr;
    header('Location: endnode.php?id=' . $MapID . '&parid=' . $NodeID);
}