<?php
    include_once dirname(__FILE__)."/models/User.php";
    include_once dirname(__FILE__)."/data/RoadMaps.php";
    session_start();
    if (!$_SESSION['user']) {
        header('Location: /');
    }
    $AllRoadMaps = RoadMaps::GetAllRoadMaps();
    $User = $_SESSION['user'];

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
        <h2 class="main__heading">Здравствуй, <?= $User->Nickname ?></h2>
        <h3 class="main__subheading">Ваши любимые карты: </h3>
        <?php for ($i = 0; $i < count($AllRoadMaps); $i++) :
            if (in_array($AllRoadMaps[$i]->ID, $User->FavMapsIDS)) :
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