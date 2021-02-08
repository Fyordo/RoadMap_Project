<?php

session_start();

class Nodes{
    public $parent;
    public $id;
    public $RoadMap;
    function render($nodetype = 'm') {
        if ($nodetype == 'm') {
            if ($this->parent->Type != "b") { // Если это не начальный пункт
                echo '<a href="/RoadMap/showlayer.php?id=' . $this->RoadMap->ID . '&parid=' . $this->parent->ParentID . '" class="right1_1"> Назад</a>';
            } else { // Если это не начальный пункт
                echo '<a href="/RoadMap/main.php?id=' . $this->RoadMap->ID . ' " class="right1_1"> Вернуться в меню карты</a>';
            }

            echo '<h2 align="center" class="roadmap__heading">' . $this->parent->Title . '</h2>
                  <p class="roadmap__text">'.$this->parent->LongDesc.'</p>
                  ';

            echo '<div id="text"><ol>';
            foreach ($this->RoadMap->Nodes as $node) {
                if ($node->ParentID == $this->parent->ID) {
                    if ($node->Type != "e") { // Если это не конечный пункт
                        $link = '/RoadMap/showlayer.php?id=' . $this->RoadMap->ID . '&parid=' . $node->ID;
                    } else { // Если это конечный пункт
                        $link = '/RoadMap/endnode.php?id=' . $this->RoadMap->ID . '&parid=' . $node->ID;
                    }
                    $text = "";
                    if ($_SESSION["user"]) {
                        if (in_array($node->ID, $_SESSION["user"]->CompletedNodes)) {
                            $text = "(Пройдено) ";
                        } else {
                            $text = "(Не пройдено) ";
                        }
                    }

                    echo '
                    <li><a href=' . $link . ' class="right1_3">' . $text . $node->Title . '</a><br></li>
                ';
                }
            }
            echo '</ol></div>';
        }
        else{
            echo '<a href="/RoadMap/showlayer.php?id=' . $this->RoadMap->ID . '&parid=' . $this->parent->ParentID . '" class="right1_1"> Назад</a>';
            if ($_SESSION["user"]){

                if (in_array($this->parent->ID, $_SESSION["user"]->CompletedNodes)){
                    echo '<br><a class="right1_6" href="/RoadMap/EndNodeActions.php?id=' . $this->RoadMap->ID . '&parid=' . $this->parent->ID . '&act=del">Убрать из пройденных</a><br>';
                    echo '<h2 align="center" class="roadmap__heading">Конечный пункт (пройдено): ' . $this->parent->Title . '</h2>';
                }
                else{
                    echo '<br><a class="right1_5" href="/RoadMap/EndNodeActions.php?id=' . $this->RoadMap->ID . '&parid=' . $this->parent->ID . '&act=add">Добавить в пройденные</a><br>';
                    echo '<h2 align="center" class="roadmap__heading">Конечный пункт: ' . $this->parent->Title . '</h2>';
                }
            }
            else{
                echo '<h2 align="center" class="roadmap__heading">Конечный пункт: ' . $this->parent->Title . '</h2>';
            }

            echo '<br><p class="roadmap__text">'.$this->parent->LongDesc.'</p>';

        }
    }
}

?>