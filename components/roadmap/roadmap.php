<?php

class Roadmap {
    public $heading;
    public $text;
    public $class;
    public $img;
    public $id;
    function render($type = "list") {
        if ($type == "list"){
            echo '
            <div class="map-item">
                <div class="map-item__image-box">
                    <img src="'.$this->img.'">
                </div>
                <div class="map-list">
                    <h3>'.$this->heading.'</h3>
                    <span class="desc">'.$this->text.'</span>
                    <a class="nav__link nav__link--signup" href="/RoadMap/main.php?id='.$this->id.'">Открыть карту</a>
                </div>
            </div>
            ';
        }
        elseif ($type = "show"){
            echo '
            
            <article class="roadmap '.$this->class.'">
                <img float="left" style="width: 250px; height: auto" src="'.$this->img.'">
                <h2 class="roadmap__heading">'.$this->heading.'</h2>
                <p class="roadmap__text">'.$this->text.'</p>
            </article>
            <br>
        ';
        }
        elseif ($type == "fav"){
            echo '
            
            <article class="roadmap '.$this->class.'" style="display:grid;grid-template-columns: 250px 1fr;">
                <img style="width: 250px; height: auto" src="'.$this->img.'">
                <div>
                    <h2 class="roadmap__heading">'.$this->heading.'</h2>
                    <a class="nav__link nav__link--signup" href="/RoadMap/main.php?id='.$this->id.'">Открыть карту</a>
                    <p class="roadmap__text">'.$this->text.'</p>
                </div>
            </article>
            <br>
        ';
        }
    }
}
?>