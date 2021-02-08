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
        <?
            $form = new CreateForm();
            $form->NewRoadMap = $NewRoadMap;
            $form->render("MainMapPage");
        ?>
        <?unset($_SESSION["system_message"]);?>
        <br>
    </div>
</main>

<?php (new Footer)->render(); ?>

<!-- Скрипты вставляем в конце body -->
<script src="/js/bootstrap.min.js"></script>
</body>

</html>