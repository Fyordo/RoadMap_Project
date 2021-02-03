<?php
    include_once "config/services.php";
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $User = $_SESSION['user'];
?>


<!DOCTYPE html>

<html lang="ru">

<?php
$head = new Head();
$head->title = 'Профиль';
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
        <h2 align="center" class="main__heading">Здравствуй, <?= $User->Nickname ?></h2>
        <h3 class="main__subheading">Ваши любимые карты: </h3>
        <?php for ($i = 0; $i < count($AllRoadMaps); $i++) :
            if (in_array($AllRoadMaps[$i]->ID, $User->FavMapsIDS)) :
                $roadmap = new Roadmap();
                $roadmap->heading = $AllRoadMaps[$i]->Name;
                $roadmap->text = $AllRoadMaps[$i]->LongDesc;
                $roadmap->id = $AllRoadMaps[$i]->ID;
                $roadmap->img = 'components/roadmap/images/' . $AllRoadMaps[$i]->ID . '.png';
                $roadmap->class = 'main__roadmap';
                $roadmap->render("fav");
            endif;
        endfor; ?>
        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>