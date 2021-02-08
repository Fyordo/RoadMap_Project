<?php
include_once "../config/services.php";
include_once "../components/form/form.php";
session_start();
?>

<!DOCTYPE html>

<html lang="ru">

<?php 
$head = new Head();
$head->title = 'Регистрация';
$head->render();
?>

<body>
    <?php 
	$header = new Header();
	$header->User = $_SESSION["user"];
	$header->render();
	?>
    <main class="main">
        <div class="wrapper main__wrapper">
            <?php
            $form = new Form();
            $form->message = $_SESSION["message"];
            $form->type = 'reg';
            $form->render();
            unset($_SESSION['message']);
            ?>
        </div>
    </main>

    <?php (new Footer)->render(); ?>

    <!-- Скрипты вставляем в конце body -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>