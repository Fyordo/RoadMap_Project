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

            $parent = $RoadMap->GetNodeByID($ParentID);
            if ($_SESSION["user"] && in_array($parent->ID, $User->CompletedNodes)){
                echo '<br><a class="nav__link nav__link--signup" href="/RoadMap/EndNodeActions.php?id=' . $RoadMap->ID . '&parid=' . $parent->ID . '&act=del">Убрать из пройденных</a><br>';
                echo '<h2 align="center" class="roadmap__heading">Конечный пункт (пройдено): ' . $parent->Title . '</h2>';
            }
            else{
                echo '<br><a class="nav__link nav__link--signup" href="/RoadMap/EndNodeActions.php?id=' . $RoadMap->ID . '&parid=' . $parent->ID . '&act=add">Добавить в пройденные</a><br>';
                echo '<h2 align="center" class="roadmap__heading">Конечный пункт: ' . $parent->Title . '</h2>';
            }
            echo '<br><p class="roadmap__text">'.$parent->LongDesc.'</p>';
            echo '<br><a class="nav__link nav__link--signup" href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $parent->ParentID . '">Вверх</a>';

            ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
