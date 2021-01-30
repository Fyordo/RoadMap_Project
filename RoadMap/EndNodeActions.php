<?php
include_once "../config/services.php";
session_start();
$MapID = $_GET["id"];
$RoadMap = RoadMaps::GetRoadMapByID($MapID);

$NodeID = $_GET["parid"];

$action = $_GET["act"];

$User = $_SESSION["user"];

if ($action == "add"){
    $new_str = '';
    array_push($User->CompletedNodes, $NodeID);
    for ($i = 0; $i < count($User->CompletedNodes); $i++){
        $new_str .= $User->CompletedNodes[$i] . '/';
    }

    // Проверяем все слои выше на то, пройдены ли они begin

    $new_nodes = '';

    $NodeParent = $RoadMap->GetNodeByID($RoadMap->GetNodeByID($NodeID)->ParentID);

    while ($NodeParent->Type != "b"){
        if ($RoadMap->ChildrenCompleted($NodeParent->ID, $User->CompletedNodes)){
            $new_nodes .= $NodeParent->ID . "/";
            array_push($User->CompletedNodes, $NodeParent->ID);
            $NodeParent = $RoadMap->GetNodeByID($RoadMap->GetNodeByID($NodeParent->ID)->ParentID);
        }
        else{
            break;
        }
    }

    // Проверяем все слои выше на то, пройдены ли они end

    $new_str .= $new_nodes;
    $_SESSION["user"] = $User;
    UserDB::ChangeCompletedNodes($User->ID, $new_str);
    header('Location: endnode.php?id=' . $MapID . '&parid=' . $NodeID);
}
else{
    $new_str = '';
    $new_arr = [];
    $erase = $RoadMap->GetParentsIDS($NodeID);

    array_push($erase, $NodeID);
    for ($i = 0; $i < count($User->CompletedNodes); $i++){
        if(!in_array($User->CompletedNodes[$i], $erase)){
            $new_str .= $User->CompletedNodes[$i] . '/';
            array_push($new_arr, $User->CompletedNodes[$i]);
        }
    }
    UserDB::ChangeCompletedNodes($User->ID, $new_str);
    $_SESSION["user"]->CompletedNodes = $new_arr;
    header('Location: endnode.php?id=' . $MapID . '&parid=' . $NodeID);
}