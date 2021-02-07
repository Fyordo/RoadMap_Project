<?php
    include_once "config/services.php";
    session_start();
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $AllCategories = Categories::GetAllCategories();
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
            <form action="/Creator/CheckDataMap.php" method="post" enctype="multipart/form-data">
                <label for="Name">Название карты: </label>
                <input id="Name" name="Name"><br><br>
                <label for="IsPopular">Считается ли популярной? (1/0) </label>
                <input id="IsPopular" name="IsPopular"><br><br>
                <label for="CategoryName">Имя категории: </label>
                <input id="CategoryName" name="CategoryName"><br><br>
                <label for="ShortDesc">Краткое описание </label>
                <input id="ShortDesc" name="ShortDesc"><br><br>
                <label for="LongDesc">Длинное описание </label>
                <input id="LongDesc" name="LongDesc"><br><br>
                <input type="file" name="image"><br><br>
                <button type="submit">Создать</button>
            </form>
            <p><?= $_SESSION["system_message"] ?></p><br>
            <? unset($_SESSION["system_message"]) ?>
		</div>
	</main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>