<?php
session_start();
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

    <title>Каталог</title>
</head>

<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <a href="Index.php"><img src="img/Icon.png" width="70" height="70" /></a>
        <p class="h5 my-0 me-md-auto fw-normal" style="margin-left: 30px;">RoadMaps</p>
        <nav class="my-2 my-md-0 me-md-3">
            <a class="nav__link" href="/ShowAll.php">Каталог карт</a>
            <a class="nav__link" href="/CreateRoadMaps.php">Создать дорожную карту</a>

            <?php
            if ($_SESSION['user']) { ?>
                <a class="nav__link nav__link--signup" href="/Profile.php">Профиль</a>
            <?php
            } else { ?>
                <a class="nav__link nav__link--signup" href="/User/SignUpPage.php">Войти</a>
            <?php
            }
            ?>
        </nav>
    </header>

    <table style="vertical-align:top;" border=2 width="100%" cellspacing="0" cellpadding="5">
        <tr>
            <?php for ($i = 0; $i < count($AllRoadMaps); $i++) : ?>
                <td>
                    <h2>
                        <strong> Название:
                            <? echo $AllRoadMaps[$i]->Name; ?>
                        </strong>
                    </h2>
                    <p>
                        <? echo $AllRoadMaps[$i]->ShortDesc ?>
                    </p>
                </td>
            <?php endfor; ?>
        </tr>
    </table>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
            </p>
            <p class="mb-1">©Fyor Lando, nerealy professi_analny web-developer</p>
        </div>
    </footer>

</body>

</html>