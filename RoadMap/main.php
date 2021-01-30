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
        $roadmap->heading = $RoadMap->Name;
        $roadmap->text = $RoadMap->LongDesc;
        $roadmap->id = $RoadMap->ID;
        $roadmap->class = 'main__roadmap';
        $roadmap->render("show");

        if ($_SESSION["user"]) {
            $count_completed = count($User->CompletedNodes);
            $percent = ($count_completed / ($RoadMap->CountOfAllChildren()-1)) * 100.0;
            echo '<p class="roadmap__text">Процент прохождения: ' . $percent . '%</p>';

            if (in_array($RoadMap->ID, $User->FavMapsIDS)) {
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/FavMapActions.php?id=' . $RoadMap->ID . '&act=del">Убрать из избранных</a>';
            }
            else {
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/FavMapActions.php?id=' . $RoadMap->ID . '&act=add">Добавить в избранные</a>';
            }
        }
        ?>

        <a class="nav__link nav__link--signup" href="/RoadMap/showlayer.php?id=<?= $RoadMap->ID ?>&parid=<?= $RoadMap->Nodes[0]->ID ?>">Показать главную ветку</a>
    </div>
</main>

<?php (new Footer)->render(); ?>

<!-- Скрипты вставляем в конце body -->
<script src="/js/bootstrap.min.js"></script>
</body>

</html>