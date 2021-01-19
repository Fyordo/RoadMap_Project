<?php
class Nav {
    public $isLogin = false;

    function return() {
        $button = '';
        if ($this->isLogin) {
            $button = '
            <a class="nav__link nav__link--signup" href="/Profile.php">Профиль</a>
            <a class="nav__link nav__link--signup" href="/User/logout.php">Выйти</a>
            ';
        }
        else {
            $button = '<a class="nav__link nav__link--signup" href="/User/SignInPage.php">Войти</a>';
        }

        return '
        <nav class="header__nav nav">
            <a class="nav__link" href="/ShowAll.php">Каталог карт</a>
            <a class="nav__link" href="/CreateRoadMaps.php">Создать дорожную карту</a>
            '.$button.'
        </nav>
        ';
    }
}
?>