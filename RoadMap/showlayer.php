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
            <h2 align="center" class="roadmap__heading">Дорожная карта: <?= $RoadMap->Name?></h2>

            <?

            $parent = $RoadMap->GetNodeByID($ParentID);
            echo '<h2 align="center" class="roadmap__heading">Пункт: ' . $parent->Title . '</h2>';
            foreach ($RoadMap->Nodes as $node){
                if ($node->ParentID == $parent->ID){
                    if ($node->Type != "e"){ // Если это не конечный пункт
                        echo '
                        <p class="roadmap__text"><a href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                        ';
                    }
                    else{ // Если это конечный пункт
                        echo '
                        <p class="roadmap__text"><a href="/RoadMap/endnode.php?id=' . $RoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                        ';
                    }
                    if (in_array($node->ID, $User->CompletedNodes)){
                        echo '
                        <p class="roadmap__text">Пройдено</p>
                        ';
                    }
                    else{
                        echo '
                        <p class="roadmap__text">Не пройдено</p>
                        ';
                    }
                    echo '
                        <p class="roadmap__text">_</p>
                        ';
                }
            }

            if ($parent->Type != "b"){ // Если это не начальный пункт
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $parent->ParentID . '">Вверх</a>';
            }
            else{ // Если это не начальный пункт
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/main.php?id=' . $RoadMap->ID .'">Вернуться в меню карты</a>';
            }

            ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
