<?php
    include_once "config/services.php";
    session_start();
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
?>

<!DOCTYPE html>

<html lang="ru">

<?php (new Head())->render(); ?>

<body>
	<?php 
	$header = new Header();
	$header->User = $_SESSION["user"];
	$header->render();
	?>

	<main class="main">
		<div class="main__wrapper wrapper">
			<?php for ($i = 0; $i < count($AllRoadMaps); $i++) :
				if ($AllRoadMaps[$i]->IsPopular) :
					$roadmap = new Roadmap();
					$roadmap->heading = $AllRoadMaps[$i]->Name;
					$roadmap->text = $AllRoadMaps[$i]->LongDesc;
                    $roadmap->id = $AllRoadMaps[$i]->ID;
					$roadmap->class = 'main__roadmap';
					$roadmap->render();
				endif;
			endfor; ?>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="/js/bootstrap.min.js"></script>
</body>

</html>