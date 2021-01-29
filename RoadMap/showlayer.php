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
            $parent = $RoadMap->Nodes[$ParentID-1];
            foreach ($RoadMap->Nodes as $node){
                if ($node->ParentID == $parent->ID){
                    if ($node->Type != "e"){
                        echo '
                        <p class="roadmap__text"><a href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                        ';
                    }
                    else{
                        echo '
                        <p class="roadmap__text"><a href="/RoadMap/endnode.php?id=' . $RoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                        ';
                    }
                }
            }
            if ($parent->Type != "b"){
                echo '<a class="nav__link nav__link--signup" href="/RoadMap/showlayer.php?id=' . $RoadMap->ID . '&parid='. $parent->ParentID . '">Вверх</a>';
            }

            ?>

        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="/js/bootstrap.min.js"></script>
    </body>

    </html><?php
