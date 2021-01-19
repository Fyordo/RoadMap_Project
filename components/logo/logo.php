<?php
class Logo {
    function return() {
        return '
        <a class="header__logo logo" href="/index.php">
            <img class="logo__img" src="/img/icon.png" width="70" height="70" alt="Logo">
            <h1 class="logo__text">RoadMaps</h1>
        </a>
        ';
    }
    function render() {
        echo '
        <a class="header__logo logo" href="/index.php">
            <img class="logo__img" src="/img/icon.png" width="70" height="70" alt="Logo">
            <h1 class="logo__text">RoadMaps</h1>
        </a>
        ';
    }
}
?>