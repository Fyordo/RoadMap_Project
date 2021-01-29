<?php
class Roadmap {
    public $heading;
    public $text;
    public $class;
    public $id;
    function render($type = "list") {
        if ($type == "list"){
            echo '
            <article class="roadmap '.$this->class.'">
                <h2 class="roadmap__heading"><a href="/RoadMap/main.php?id='.$this->id.'">Дорожная карта: '.$this->heading.'</a></h2>
                <p class="roadmap__text">'.$this->text.'</p>
            </article>
            ';
        }
        elseif ($type = "show"){
            echo '
            <article class="roadmap '.$this->class.'">
                <h2 align="center" class="roadmap__heading">Дорожная карта: '.$this->heading.'</h2>
                <p class="roadmap__text">'.$this->text.'</p>
            </article>
            ';
        }

    }
}
?>