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
            $nodes = new Nodes();
            $nodes->parent = $RoadMap->GetNodeByID($ParentID);
            $nodes->id = $ParentID;
            $nodes->RoadMap = $RoadMap;
            $nodes->render();
        ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
