<?php
class Nav {
    public $User = false;

    function return() {
        $button = '';
        $create = '';
        if ($this->User) {
            $button = '
            <a class="regular" href="/Profile.php"> Профиль </a>
            <a class="regular" href="/User/logout.php"> Выйти </a>
            ';
            if ($this->User->IsSuperUser){
                $create = '<a class="regular" href="/CreateRoadMaps.php"> Создать дорожную карту </a>';
            }

        }
        else {
            $button = '<a class="regular" href="/User/SignInPage.php"> Войти </a>';
        }

        return '
        <nav class="header__nav nav">
            <a class="regular" href="/ShowAll.php"> Каталог карт </a>
            '.$create.'
            '.$button.'
        </nav>
        ';
    }
}
?>