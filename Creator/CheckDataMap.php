<?php
include_once "../config/services.php";
session_start();

if ($_POST["Name"] == ''){
    $_SESSION["system_message"] = "Введите название карты";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

foreach (RoadMaps::GetAllRoadMaps() as $CurrRoadMap){
    if ($CurrRoadMap->Name == $_POST["Name"]){
        $_SESSION["system_message"] = "Такая карта уже есть";
        header('Location: ../CreateRoadMaps.php');
        exit;
    }
}

$flag = false;
foreach (Categories::GetAllCategories() as $CurrCategory){
    if ($CurrCategory->CategoryName == $_POST["CategoryName"]){
        $flag = true;
        break;
    }
}
if (!$flag){
    $_SESSION["system_message"] = "Такой категории нет";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

if (!in_array($_POST["IsPopular"], ['1', '0'])){
    $_SESSION["system_message"] = "Неверное значение популярности";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

if ($_POST["ShortDesc"] == ''){
    $_SESSION["system_message"] = "Введите краткое описание";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

if ($_POST["LongDesc"] == ''){
    $_SESSION["system_message"] = "Введите длинное описание";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

if (!$_FILES['image']){
    $_SESSION["system_message"] = "Загрузите квадратную картинку png";
    header('Location: ../CreateRoadMaps.php');
    exit;
}

$CurrList = RoadMaps::GetAllRoadMaps();
$MapID = (int)$CurrList[count($CurrList) - 1]->ID + 1;
$_SESSION["new_roadmap"] = new FullRoadMap($MapID, $_POST["Name"], Categories::FindIDByName($_POST["CategoryName"]), [], $_POST["IsPopular"], $_POST["ShortDesc"], $_POST["LongDesc"]);

$CurrList = RoadMaps::GetAllNodes();
$NewID = $CurrList[count($CurrList) - 1]->ID + 1;
array_push($_SESSION["new_roadmap"]->Nodes, new RoadMapNode($NewID, 0, $MapID, 'b', $_POST["Name"], $_POST['LongDesc']));
move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__)."/../components/roadmap/images/". $MapID . ".png");

$_SESSION["system_message"] = "Карта инициализирована";
header('Location: mainPage.php?id=' . $MapID);