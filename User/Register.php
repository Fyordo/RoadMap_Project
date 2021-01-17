<?php
    session_start();
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <!-- Несколько обязательных meta тегов -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title>RoadMap Redactor</title>

    <!-- link вставляем в конце head -->
    <link href="../css/_reset.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header class="header">
        <div class="header__wrapper wrapper">
            <a class="header__logo logo" href="/index.php">
                <img class="logo__img" src="/img/icon.png" width="70" height="70" alt="Logo">
                <h1 class="logo__text">RoadMaps</h1>
            </a>
        </div>
    </header>

    <form action="actions/signup.php" method="post" enctype="multipart/form-data">
        <label>Никнейм</label>
        <input name="nickname">
        <label>Логин</label>
        <input name="login">
        <label>Пароль</label>
        <input name="password">
        <label>Подтверждение пароля</label>
        <input name="confirm_password">
        <button>Регистрация</button>
        <p>
            У вас уже есть аккаунт? <a href="/User/SignUpPage.php">Войдите</a>
        </p>

        <p>
            <?= $_SESSION["message"] ?>
        </p>
    </form>

    <footer class="footer">
        <div class="footer__wrapper wrapper">
            <p class="footer__text">©Fyor Lando, nerealy professi_analny backend-developer😎</p>
            <p class="footer__text">©Learde, nerealy professi_analny frontend-developer😎</p>
        </div>
    </footer>

    <!-- Скрипты вставляем в конце body -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>