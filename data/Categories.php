<?php
include_once 'models/FullRoadMap.php';
include_once 'models/RoadMapNode.php';
include_once 'models/Category.php';

class Categories
{
    public static function GetAllCategories()
    {
        $res = [];
        $link = mysqli_connect("localhost", "root", "root", "roadmapproject", 3306);

        $sql = 'SELECT * FROM `categories`';
        $result = mysqli_query($link, $sql);

        $CountRows = mysqli_num_rows($result);

        for ($i = 0; $i < $CountRows; $i++){
            $row = mysqli_fetch_row($result);
            $CurrCategory = new Category();
            $CurrCategory->ID = $row[0];
            $CurrCategory->CategoryName = $row[1];
            $CurrCategory->Description = $row[2];
            array_push($res, $CurrCategory);
        }
        mysqli_close($link);

        return $res;
    }

    public static function AddNewCategory($CategoryName, $Description){
        $link = mysqli_connect("localhost", "root", "root", "roadmapproject", 3306);

        $CurrList = self::GetAllCategories();
        $NewID = (int)$CurrList[count($CurrList) - 1]->ID + 1;
        $sql = "INSERT INTO `categories` (`ID`, `CategoryName`, `Description`) VALUES ('$NewID',  '$CategoryName', '$Description')";
        $result = mysqli_query($link, $sql);

        mysqli_close($link);
    }

    public static function FindIDByName($Name){
        $Categories = Categories::GetAllCategories();
        for ($i = 0; $i < count($Categories); $i++){
            if ($Categories[$i]->CategoryName == $Name){
                return (int)$Categories[$i]->ID;
            }
        }
        return -1;
    }

    public static function FindNameById($ID){
        $Categories = Categories::GetAllCategories();
        for ($i = 0; $i < count($Categories); $i++){
            if ($Categories[$i]->ID == $ID){
                return $Categories[$i]->CategoryName;
            }
        }
        return "";
    }
}