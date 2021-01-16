<?php

class FullRoadMap{
    public $ID; // ID полной дорожной карты
    public $Name; // Имя дорожной карты
    public $CategoryID; // ID категории
    public $IsPopular; // Является ли эта карта популярной (отображается на главной странице)
    public $ShortDesc; // Краткое описание
    public $LongDesc; // Длинное описание

    public $Nodes; // Все пункты дорожной карты
    public $CategoryName; // Имя категории данной карты

    public function __construct($id, $name, $categoryId, $nodes, $isPopular, $ShortDesc, $LongDesc)
    {
        $this->ID = $id;
        $this->Name = $name;
        $this->CategoryId = $categoryId;
        $this->Nodes = $nodes;
        $this->IsPopular = $isPopular;
        $this->ShortDesc = $ShortDesc;
        $this->LongDesc = $LongDesc;
    }

    // Добавить новый пункт в массив пунктов
    public function AddNode(RoadMapNode $Node){
        array_push($this->Nodes, $Node);
    }

    // Получить все ответвления от данного пункта
    public function GetChildren(RoadMapNode $Parent){
        $Ans = [];
        for ($i = 0; $i < count($this->Nodes); $i++){
            if ($this->Nodes[$i]->ParentID == $Parent->ID){
                array_push($Ans, $this->Nodes[$i]);
            }
        }
        return $Ans;
    }
}
