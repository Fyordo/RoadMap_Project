<?php
include_once 'models/FullRoadMap.php';
include_once 'models/RoadMapNode.php';
include_once 'models/Category.php';
include_once 'config.php';

class RoadMaps
{
    public static function GetAllRoadMaps()
    {
        $AllRoadMaps = [];
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = 'SELECT * FROM `roadmapslist`';
        $roadmaps = mysqli_query($link, $sql);

        $nodes = self::GetAllNodes();

        // Надо бы попробовать читать не всю таблицу, а только часть в цикле

        $CountRowsRoadMaps = mysqli_num_rows($roadmaps);
        $CountRowsNodes = count($nodes);

        for ($i = 0; $i < $CountRowsRoadMaps; $i++) {

            $MapRow = mysqli_fetch_row($roadmaps);
            $CurrRoadMap = new FullRoadMap($MapRow[0], $MapRow[1], $MapRow[2], array(), $MapRow[3], $MapRow[4], $MapRow[5]);

            for ($j = 0; $j < $CountRowsNodes; $j++) {
                $CurrNode = new RoadMapNode($nodes[$j]->ID, $nodes[$j]->ParentID, $nodes[$j]->RoadMapID, $nodes[$j]->Type, $nodes[$j]->Title, $nodes[$j]->LongDesc);
                if ($CurrNode->RoadMapID == $CurrRoadMap->ID) {
                    array_push($CurrRoadMap->Nodes, $CurrNode);
                }
            }
            array_push($AllRoadMaps, $CurrRoadMap);
        }

        mysqli_close($link);
        return $AllRoadMaps;
    }

    public static function GetAllNodes()
    {
        $AllNodes = [];
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = 'SELECT * FROM `nodeslist`';
        $nodes = mysqli_query($link, $sql);

        $CountRowsNodes = mysqli_num_rows($nodes);

        for ($j = 0; $j < $CountRowsNodes; $j++) {

            $NodeRow = mysqli_fetch_row($nodes);
            $CurrNode = new RoadMapNode($NodeRow[0], $NodeRow[1], $NodeRow[2], $NodeRow[3], $NodeRow[4], $NodeRow[5]);
            array_push($AllNodes, $CurrNode);
        }

        mysqli_close($link);
        return $AllNodes;
    }

    public static function InitNewRoadMap($Name, $CategoryName, $isPopular, $ShortDesc, $LongDesc)
    {
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $CurrList = self::GetAllRoadMaps();
        $CID = Categories::FindIDByName($CategoryName);

        $NewID = (int)$CurrList[count($CurrList) - 1]->ID + 1;
        $sql = "INSERT INTO `roadmapslist` (`ID`, `Name`, `CategoryID`, `IsPopular`, `ShortDesc`, `LongDesc`) VALUES ('$NewID',  '$Name', '$CID', '$isPopular', '$ShortDesc', '$LongDesc')";
        $result = mysqli_query($link, $sql);

        mysqli_close($link);
    }

    public static function AddNewNode($ParentID, $RoadMapID, $Type, $Title, $Description)
    {
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $Nodes = self::GetAllNodes();

        $NewID = (int)$Nodes[count($Nodes) - 1]->ID + 1;
        $sql = "INSERT INTO `nodeslist` (`ID`, `ParentID`, `RoadMapID`, `Type`, `Title`, `Description`) VALUES ('$NewID',  '$ParentID', '$RoadMapID', '$Type', '$Title', '$Description')";
        $result = mysqli_query($link, $sql);

        if ($result){
            echo "Балдёж";
        }
        else{
            echo "Не балдёж";
        }

        mysqli_close($link);
    }

}
