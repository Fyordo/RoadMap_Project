<?php
session_start();

include_once "../components/footer/footer.php";
include_once "../components/head/head.php";
include_once "../components/header/header.php";
include_once "../components/form/form.php";
?>

<!DOCTYPE html>

<html lang="ru">

<?php 
$head = new Head();
$head->title = 'Roadmap Redactor';
$head->render();
?>

<body>
	<?php 
	$header = new Header();
	$header->isLogin = $_SESSION["user"];
	$header->render();
	?>

	<main class="main">
        <div class="wrapper main__wrapper">
            <?php
            $form = new Form();
            $form->message = $_SESSION["message"];
            $form->type = 'login';
            $form->render();
            ?>
        </div>
    </main>

	<?php (new Footer)->render(); ?>

	<!-- Скрипты вставляем в конце body -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>