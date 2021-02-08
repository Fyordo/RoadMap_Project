<?php
include_once "../config/services.php";
session_start();
$RoadMap = RoadMaps::GetRoadMapByID($_GET['id']);
$User = $_SESSION["user"];
?>

<!DOCTYPE html>

<html lang="ru">

<?
$head = new Head();
$head->title = $RoadMap->Name;
$head->render();
?>

<body>
<?php
$header = new Header();
$header->User = $_SESSION["user"];
$header->render();
?>

<main class="main">
    <div class="main__wrapper wrapper">
        <?php

        $roadmap = new Roadmap();

        if ($_SESSION["user"]){
            if (in_array($RoadMap->ID, $User->FavMapsIDS)) {
                $roadmap->IsFavorite = true;
            }
            else{
                $roadmap->IsFavorite = false;
            }
        }

        $roadmap->heading = $RoadMap->Name;
        $roadmap->text = $RoadMap->LongDesc;
        $roadmap->id = $RoadMap->ID;
        $roadmap->class = 'main__roadmap';
        $roadmap->img = '../components/roadmap/images/' . $RoadMap->ID . '.png';


        if ($_SESSION["user"]) {
            $count_completed = count($User->CompletedNodes);
            $roadmap->percent = ($count_completed / ($RoadMap->CountOfAllChildren()-1)) * 100.0;
        }
        $roadmap->first_node_id = $RoadMap->Nodes[0]->ID;

        $roadmap->render("map_menu");
        ?>
    </div>
</main>

<?php (new Footer)->render(); ?>

<!-- Скрипты вставляем в конце body -->
<script src="/js/bootstrap.min.js"></script>
</body>

</html>