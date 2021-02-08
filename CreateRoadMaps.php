<?php
    include_once "config/services.php";
    session_start();
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    unset($_SESSION["new_roadmap"]);
?>

<!DOCTYPE html>

<html lang="ru">

<?php 
$head = new Head();
$head->title = 'Редактор карт';
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
                $form->render("StartPage");
            ?>
            <p><?= $_SESSION["system_message"] ?></p><br>
            <? unset($_SESSION["system_message"]) ?>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>