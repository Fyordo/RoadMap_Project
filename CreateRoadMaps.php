<?php
    include_once "config/services.php";
    session_start();
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $AllCategories = Categories::GetAllCategories();
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
            <h2 class="roadmap__heading" align="center">Тут пока ничего нет, но будет UI для создания RoadMap-ов</h2>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>