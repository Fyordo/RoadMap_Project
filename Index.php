<?php
include_once "data/RoadMaps.php";
include_once "data/Categories.php";
$AllRoadMaps = RoadMaps::GetAllRoadMaps();
$AllCategories = Categories::GetAllCategories();
?>

<!DOCTYPE html>

<html lang="HTML">

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/Background.css" rel="stylesheet" type="text/css" />
    <script src="js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width" />

    <title>RoadMaps Manager</title>
</head>

<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <a href="Index.php"><img src="img/Icon.png" width="70" height="70" /></a>
        <p class="h5 my-0 me-md-auto fw-normal" style="margin-left: 30px;">RoadMaps</p>
        <nav class="my-2 my-md-0 me-md-3">
            <a class="p-2 text-dark" href="ShowAll.php">All RoadMaps</a>
            <a class="p-2 text-dark" href="#">Create RoadMap</a>
            <a class="p-2 text-dark" href="#">My RoadMaps</a>
        </nav>
        <a class="btn btn-outline-primary" href="#">Sign up</a>
    </header>
    <h1 style="margin-left: 100px;"> <?php echo $AllCategories[3]->CategoryName; ?></h1>
    <?php for ($i = 0; $i < count($AllRoadMaps); $i++) : ?>
        <?php if ($AllRoadMaps[$i]->IsPopular) : ?>
            <h2>
                <strong style="margin-left: 10px;"> Дорожная карта:
                    <? echo $AllRoadMaps[$i]->Name; ?>
                </strong>
            </h2>
            <p style="margin-left: 30px;">
                <? echo $AllRoadMaps[$i]->LongDesc; ?>
            </p>


        <?php endif; ?>
    <?php endfor; ?>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
            </p>
            <p class="mb-1">©Fyor Lando, nerealy professi_analny web-developer</p>
        </div>
    </footer>

</body>

</html>