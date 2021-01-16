<?php

class RoadMapNode{
    public $ID; // ID пункта
    public $ParentID; // ID родительского пункта
    public $RoadMapID; // ID основной карты
    public $Type; // Тип Node-a (b = начальный, m = средний, e = конечный)
    public $Title; // Название пункта
    public $LongDesc; // Описание пункта

    public function __construct($id, $ParentID, $RoadMapID, $Type, $Title, $LongDesc){
        $this->ID = $id;
        $this->ParentID = $ParentID;
        $this->RoadMapID = $RoadMapID;
        $this->Type = $Type;
        $this->Title = $Title;
        $this->LongDesc = $LongDesc;
    }
}
