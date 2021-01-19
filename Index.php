<?php
	session_start();
	include_once "data/RoadMaps.php";
	include_once "data/Categories.php";
	include_once "data/UserDB.php";
	$AllRoadMaps = RoadMaps::GetAllRoadMaps();

	include_once "components/footer/footer.php";
	include_once "components/head/head.php";
	include_once "components/header/header.php";
	include_once "components/roadmap/roadmap.php";
?>

<!DOCTYPE html>

<html lang="ru">

<?php (new Head())->render(); ?>

<body>
	<?php 
	$header = new Header();
	$header->isLogin = $_SESSION["user"];
	$header->render();
	?>

	<main class="main">
		<div class="main__wrapper wrapper">
			<?php for ($i = 0; $i < count($AllRoadMaps); $i++) :
				if ($AllRoadMaps[$i]->IsPopular) :
					$roadmap = new Roadmap();
					$roadmap->heading = $AllRoadMaps[$i]->Name;
					$roadmap->text = $AllRoadMaps[$i]->LongDesc;
					$roadmap->class = 'main__roadmap';
					$roadmap->render();
				endif;
			endfor; ?>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>