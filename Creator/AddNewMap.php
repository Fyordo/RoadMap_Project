<?php
include_once "../config/services.php";
session_start();
$RoadMap = $_SESSION["new_roadmap"];

RoadMaps::InitNewRoadMap($RoadMap->ID, $RoadMap->Name, $RoadMap->CategoryID, $RoadMap->IsPopular, $RoadMap->ShortDesc, $RoadMap->LongDesc);

foreach ($RoadMap->Nodes as $node){
    var_dump($RoadMap->Nodes);
    RoadMaps::AddNewNode($node->ID, $node->ParentID, $node->RoadMapID, $node->Type, $node->Title, $node->LongDesc);
}

header("Location: ../ShowAll.php");