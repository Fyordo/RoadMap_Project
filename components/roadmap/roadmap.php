<?php

session_start();

class Roadmap {
    public $heading;
    public $text;
    public $class;
    public $img;
    public $id;
    public $IsFavorite = false;
    public $percent = 0;
    public $first_node_id;
    function render($type) {
        switch ($type){
            case "list":
                echo '
                <div class="map-item">
                <div class="map-item__image-box">
                    <img src="'.$this->img.'">
                </div>
                <div class="map-list">
                    <h3>'.$this->heading.'</h3>
                    <span class="desc">'.$this->text.'</span>
                    <a class="regular" href="/RoadMap/main.php?id='.$this->id.'">Открыть карту</a>
                </div>
                </div>
                ';
                break;

            case "popular":
                echo '
                <div id="pic">
                <a href="/RoadMap/main.php?id='.$this->id.'" class="regular">
                    <img style="width: 250px; height: auto" src="'.$this->img.'" alt='.$this->heading.'>
                    <h2 class="roadmap__heading" align="center">'.$this->heading.'</h2>
                </a>
                </div>
                <div id="text">
                    <p class="roadmap__text">'.$this->text.'</p>
                </div>
                <br>
                ';
                break;

            case "map_menu":
                echo '<h2 class="roadmap__heading" align="center">Дорожная карта: '.$this->heading.'</h2>';
                echo '<a class="right1_1-map" href="/RoadMap/showlayer.php?id='. $this->id . '&parid='.$this->first_node_id.'">Показать главную ветку</a><br>';
                echo '<div id="pic">';
                echo '<img style="width: 250px; height: auto" src="'.$this->img.'" alt='.$this->heading.'>';
                if ($_SESSION["user"]) {
                    echo '<br><p class="roadmap__text">Процент прохождения: ' . $this->percent . '%</p><br>';
                }

                if ($_SESSION["user"]){
                    if ($this->IsFavorite) {
                        echo '<br><a class="right1_6" href="/RoadMap/FavMapActions.php?id=' . $this->id . '&act=del">Убрать из избранных</a><br>';
                    }
                    else {
                        echo '<br><a class="right1_5" href="/RoadMap/FavMapActions.php?id=' . $this->id . '&act=add">Добавить в избранные</a><br>';
                    }
                }
                echo '</div>';


                echo '
                <div id="text">
                    <p class="roadmap__text">'.$this->text.'</p>
                </div>
                <br>
                ';
                break;
            case "fav":
                echo '
                    <div id="pic">
                    <a href="/RoadMap/main.php?id='.$this->id.'" class="regular">
                        <img style="width: 250px; height: auto" src="'.$this->img.'" alt='.$this->heading.'>
                        <h2 class="roadmap__heading" align="center">'.$this->heading.'</h2>
                    </a>
                    </div>
                    <div id="text">
                        <p class="roadmap__text">'.$this->text.'</p>
                    </div>
                    <br>
                ';
                break;

            case "create":
                echo '
                    <article class="roadmap '.$this->class.'">
                        <img float="left" style="width: 250px; height: auto" src="'.$this->img.'">
                        <h2 class="roadmap__heading">'.$this->heading.'</h2>
                        <p class="roadmap__text">'.$this->text.'</p>
                    </article>
                    <a class="nav__link nav__link--signup" href="/Creator/main.php">Открыть карту</a>
                    <br>
                ';
                break;
        }
    }
}
?>