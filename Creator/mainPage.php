<?php
include_once "../config/services.php";
session_start();
$NewRoadMap = $_SESSION["new_roadmap"];
$User = $_SESSION["user"];
?>

<!DOCTYPE html>

<html lang="ru">

<?
$head = new Head();
$head->title = 'Главная страница карты';
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
        <a class="nav__link nav__link--signup" href="/Creator/AddNewMap.php">Добавить в каталог</a>
        <article class="roadmap '.$this->class.'">
            <img float="left" style="width: 250px; height: auto" src="../components/roadmap/images/<?=$NewRoadMap->ID?>.png">
            <h2 class="roadmap__heading"><?=$NewRoadMap->Name?></h2>
            <p class="roadmap__text"><?=$NewRoadMap->LongDesc?></p>
        </article>
        <a class="nav__link nav__link--signup" href="/Creator/layerPage.php?id=<?=$NewRoadMap->ID?>&parid=<?=$NewRoadMap->Nodes[0]->ID?>">Открыть карту</a>
        <?unset($_SESSION["system_message"]);?>
        <br>
    </div>
</main>

<?php (new Footer)->render(); ?>

<!-- Скрипты вставляем в конце body -->
<script src="/js/bootstrap.min.js"></script>
</body>

</html>