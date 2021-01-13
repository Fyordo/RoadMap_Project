<?php
include_once 'models/FullRoadMap.php';
include_once 'models/RoadMapNode.php';
include_once 'models/Category.php';

$link = mysqli_connect("localhost", "root", "root", "roadmapproject", 3306);

class RoadMaps
{
    public static function GetAllRoadMaps()
    {
        $AllRoadMaps = [];
        $link = mysqli_connect("localhost", "root", "root", "roadmapproject", 3306);

        $sql = 'SELECT * FROM `roadmapslist`';
        $roadmaps = mysqli_query($link, $sql);

        $sql = 'SELECT * FROM `nodeslist`';
        $nodes = mysqli_query($link, $sql);

        $CountRowsRoadMaps = mysqli_num_rows($roadmaps);
        $CountRowsNodes = mysqli_num_rows($nodes);

        for ($i = 0; $i < $CountRowsRoadMaps; $i++){

            $MapRow = mysqli_fetch_row($roadmaps);
            $CurrRoadMap = new FullRoadMap($MapRow[0], $MapRow[1], $MapRow[2], array(), $MapRow[3], $MapRow[4], $MapRow[5]);

            for ($j = 0; $j < $CountRowsNodes; $j++){

                $NodeRow = mysqli_fetch_row($nodes);
                $CurrNode = new RoadMapNode($NodeRow[0], $NodeRow[1], $NodeRow[2], $NodeRow[3], $NodeRow[4], $NodeRow[5]);
                if ($CurrNode->RoadMapID == $CurrRoadMap->ID){
                    array_push($CurrRoadMap->Nodes, $CurrNode);
                }
            }
            array_push($AllRoadMaps, $CurrRoadMap);
        }
        return $AllRoadMaps;
    }
}

mysqli_close($link);