<?php
include_once "../config/services.php";
session_start();
$RoadMap = $_SESSION["new_roadmap"];
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
    $header->User = $_SESSION["user"];
    $header->render();
    ?>

    <main class="main">
        <div class="main__wrapper wrapper">
            <?
                $form = new CreateForm();
                $form->NewRoadMap = $RoadMap;
                $form->ParentID = $ParentID;
                $form->render("LayerPage");
            ?>


            <? unset($_SESSION["system_message"]) ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
