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

    public function CountOfAllChildren(): int
    {

    }
}
