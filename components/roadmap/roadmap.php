<?php
class Roadmap {
    public $heading;
    public $text;
    public $class;
    function render() {
        echo '
        <article class="roadmap '.$this->class.'">
            <h2 class="roadmap__heading">Дорожная карта:'.$this->heading.'</h2>
            <p class="roadmap__text">'.$this->text.'</p>
        </article>
        ';
    }
}
?>