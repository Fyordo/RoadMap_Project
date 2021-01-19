<?php
    session_start();
    include_once "data/RoadMaps.php";
    include_once "data/Categories.php";
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $AllCategories = Categories::GetAllCategories();

    include_once "components/footer/footer.php";
	include_once "components/head/head.php";
	include_once "components/header/header.php";
	include_once "components/roadmap/roadmap.php";
?>

<!DOCTYPE html>

<html lang="HTML">

<?php 
$head = new Head();
$head->title = 'Каталог';
$head->render();
?>

<body>
    <?php 
    $header = new Header();
    $header->isLogin = $_SESSION["user"];
    $header->render();
    ?>



    <main class="main main--catalog">
        <div class="wrapper main__wrapper">
            <?php for ($i = 0; $i < count($AllRoadMaps); $i++) :
                $roadmap = new Roadmap();
                $roadmap->heading = $AllRoadMaps[$i]->Name;
                $roadmap->text = $AllRoadMaps[$i]->LongDesc;
                $roadmap->class = 'main__roadmap main__roadmap--card';
                $roadmap->render();
            endfor; ?>
        </div>
    </main>

    <?php (new Footer)->render(); ?>
</body>

</html>