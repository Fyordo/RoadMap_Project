<?php
session_start();
include_once "data/RoadMaps.php";
include_once "data/Categories.php";
$AllRoadMaps = RoadMaps::GetAllRoadMaps();
$AllCategories = Categories::GetAllCategories();

include_once "components/head/head.php";
include_once "components/header/header.php";
include_once "components/footer/footer.php";
?>

<!DOCTYPE html>

<html lang="ru">

<?php 
$head = new Head();
$head->title = 'Roadmap Redactor';
$head->render();
?>

<body>
	<?php 
	$header = new Header();
	$header->isLogin = $_SESSION["user"];
	$header->render();
	?>

	<main class="main">
		<div class="main__wrapper wrapper">
			<h1>Тут пока ничего нет, но будет UI для создания RoadMap-ов</h1>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>