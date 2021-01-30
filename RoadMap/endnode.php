<?php
include_once "../config/services.php";
session_start();
$RoadMap = RoadMaps::GetRoadMapByID($_GET['id']);
$User = $_SESSION["user"];
$ParentID = $_GET['parid'];
?>

    <!DOCTYPE html>

    <html lang="ru">

<?php
$head = new Head();
$head->title = $RoadMap->Name;
$head->render();
?>

    <body>
    <?php
    $header = new Header();
    $header->User = $User;
    $header->render();
    ?>

    <main class="main">
        <div class="main__wrapper wrapper">
            <?

            $parent = $RoadMap->Nodes[$ParentID-1];
            if ($_SESSION["user"] && in_array($parent->ID, $User->CompletedNodes)){
                echo '<h2 align="center" class="roadmap__heading">Конечный пункт (пройдено): ' . $RoadMap->Nodes[$ParentID-1]->Title . '</h2>';
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/EndNodeActions.php?id=' . $RoadMap->ID . '&parid=' . $parent->ID . '&act=del">Убрать из пройденных</a>';
            }
            else{
                echo '<h2 align="center" class="roadmap__heading">Конечный пункт: ' . $RoadMap->Nodes[$ParentID-1]->Title . '</h2>';
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/EndNodeActions.php?id=' . $RoadMap->ID . '&parid=' . $parent->ID . '&act=add">Добавить в пройденные</a>';
            }
            echo '<p class="roadmap__text">'.$parent->LongDesc.'</p>';
            echo '<a class="nav__link nav__link--signup" href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $parent->ParentID . '">Вверх</a>';

            ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
