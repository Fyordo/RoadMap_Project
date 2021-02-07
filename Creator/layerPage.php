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
            <h2 align="center" class="roadmap__heading">Дорожная карта: <?= $RoadMap->Name?></h2>

            <?
            $parent = $RoadMap->GetNodeByID($ParentID);
            if ($parent->Type != 'b'){
                echo '<h2 align="center" class="roadmap__heading">Пункт: ' . $parent->Title . '</h2>';
            }

            foreach ($RoadMap->Nodes as $node){
                if ($node->ParentID == $parent->ID){
                    if ($node->Type != "e"){ // Если это не конечный пункт
                        echo '
                        <p class="roadmap__text"><a href="/Creator/layerPage.php?id=' . $RoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                        ';
                    }
                    else{ // Если это конечный пункт
                        echo '
                        <p class="roadmap__text">'. $node->Title . '</p>
                        ';
                    }
                    echo '
                        <br>
                        ';
                }
            }
            ?>

            <!-- Создание нового Node-a -->

            <form action="/Creator/CheckDataNode.php?id=<?=$RoadMap->ID?>&parid=<?=$ParentID?>" method="post" enctype="multipart/form-data">
                <label for="Name">Название пункта: </label>
                <input id="Name" name="Name"><br><br>
                <label for="LongDesc">Длинное описание </label>
                <input id="LongDesc" name="LongDesc"><br><br>
                <label for="Type">Пункт конечный? (1/0) </label>
                <input id="Type" name="Type"><br><br>
                <button type="submit">Создать</button>
            </form>
            <p><?= $_SESSION["system_message"] ?></p><br>
            <? unset($_SESSION["system_message"]) ?>


            <?
            if ($parent->Type != "b"){ // Если это не начальный пункт
                echo '<a class="nav__link nav__link--signup" href="/Creator/layerPage.php?id=' . $RoadMap->ID . '&parid='. $parent->ParentID . '">Вверх</a>';
            }
            else{ // Если это не начальный пункт
                echo '<a class="nav__link nav__link--signup" href="/Creator/mainPage.php?id=' . $RoadMap->ID .'">Вернуться в меню карты</a>';
            }

            ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
