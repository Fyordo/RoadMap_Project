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

        return $res;
    }
}

mysqli_close($link);