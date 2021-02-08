<?php
    include_once "config/services.php";
    session_start();
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $AllCategories = Categories::GetAllCategories();
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
    $header->User = $_SESSION["user"];
    $header->render();
    ?>



    <main class="main main--catalog">
        <div class="wrapper main__wrapper main__wrapper--grid">
        <?php for ($i = 0; $i < count($AllRoadMaps); $i++){
            $roadmap = new Roadmap();
            $roadmap->heading = $AllRoadMaps[$i]->Name;
            $roadmap->text = $AllRoadMaps[$i]->ShortDesc;
            $roadmap->id = $AllRoadMaps[$i]->ID;
            $roadmap->class = 'main__roadmap main__roadmap--card';
            $roadmap->img = 'components/roadmap/images/' . $AllRoadMaps[$i]->ID . '.png';
            $roadmap->render("list");
        }
        ?>
        </div>
    </main>

    <?php (new Footer)->render(); ?>
</body>

</html>