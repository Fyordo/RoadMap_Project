<?php

class CreateForm{
    public $NewRoadMap = null;
    public $ParentID = null;
    public function render($type){
        switch ($type){
            case "StartPage":
                $AllCategories = Categories::GetAllCategories();

                $CategorySelect = '';

                foreach ($AllCategories as $category){
                    $CategorySelect .= '<option value="'. $category->CategoryName .'">'. $category->CategoryName .'</option>';
                }

                echo '
                <h2 align="center" class="roadmap__heading">Введите основную информацию о дорожной карте</h2>
                <form action="/Creator/CheckDataMap.php" method="post" enctype="multipart/form-data">
                    <input id="Name" name="Name" placeholder="Название карты" type="text">
                    <select id="IsPopular" name="IsPopular">
                        <option value="1">Карта популярна</option>
                        <option value="0">Карта не популярна</option>
                    </select>
                    <select id="CategoryName" name="CategoryName">
                        ' . $CategorySelect . '
                    </select>
                    <input id="ShortDesc" name="ShortDesc" placeholder="Краткое описание" type="text">
                    <textarea id="LongDesc" name="LongDesc" placeholder="Длинное описание" type="text"></textarea><br><br>
                    <input type="file" name="image"><br><br>
                    <button>Создать</button>
                </form>';
                break;
            case "MainMapPage":
                echo '
                    <a class="right1_3" href="/Creator/AddNewMap.php">Добавить в каталог</a>
                    <article class="roadmap">
                        <img float="left" style="width: 250px; height: auto" src="../components/roadmap/images/' . $this->NewRoadMap->ID . '.png">
                        <h2 class="roadmap__heading">' . $this->NewRoadMap->Name . '</h2>
                        <p class="roadmap__text">' . $this->NewRoadMap->LongDesc . '</p>
                    </article>
                    <a class="right1_3" href="/Creator/layerPage.php?id=' . $this->NewRoadMap->ID . '&parid=' . $this->NewRoadMap->Nodes[0]->ID . '">Открыть карту</a>
                ';
                break;
            case "LayerPage":
                $parent = $this->NewRoadMap->GetNodeByID($this->ParentID);
                if ($parent->Type != "b"){ // Если это не начальный пункт
                    echo '<a class="right1_1" href="/Creator/layerPage.php?id=' . $this->NewRoadMap->ID . '&parid='. $parent->ParentID . '"> Вверх</a>';
                }
                else{ // Если это не начальный пункт
                    echo '<a class="right1_1" href="/Creator/mainPage.php?id=' . $this->NewRoadMap->ID .'"> Вернуться в меню карты</a>';
                }
                echo '<h2 align="center" class="roadmap__heading">Дорожная карта: ' . $this->NewRoadMap->Name . '</h2>';


                if ($parent->Type != 'b'){
                    echo '<h2 align="center" class="roadmap__heading">Пункт: ' . $parent->Title . '</h2>';
                }

                foreach ($this->NewRoadMap->Nodes as $node){
                    if ($node->ParentID == $parent->ID){
                        if ($node->Type != "e"){ // Если это не конечный пункт
                            echo '
                                <p class="roadmap__text"><a class="right1_3" href="/Creator/layerPage.php?id=' . $this->NewRoadMap->ID . '&parid='. $node->ID .'">'. $node->Title . '</a></p>
                            ';
                        }
                        else{ // Если это конечный пункт
                            echo '
                                <p class="roadmap__text">'. $node->Title . '</p>
                            ';
                        }
                        echo '<br>';
                    }
                }
                echo '
                    <form action="/Creator/CheckDataNode.php?id=' . $this->NewRoadMap->ID . '&parid=' . $this->ParentID . '" method="post" enctype="multipart/form-data">
                        <input id="Name" name="Name" placeholder="Название пункта" type="text">
                        <select id="Type" name="Type">
                            <option value="1">Пункт конечный</option>
                            <option value="0">Пункт не конечный</option>
                        </select>
                        <textarea id="LongDesc" name="LongDesc" placeholder="Длинное описание" type="text"></textarea><br><br>
                        <button>Создать</button>
                    </form>
                ';


                break;
        }
    }
}