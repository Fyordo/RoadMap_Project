<?php

class RoadMapNode{
    public $ID;
    public $ParentID;
    public $RoadMapID; // ID основной карты
    public $Type; // Тип Node-a (начальный, средний, конечный)
    public $Title;
    public $LongDesc;

    public function __construct($id, $ParentID, $RoadMapID, $Type, $Title, $LongDesc){
        $this->ID = $id;
        $this->ParentID = $ParentID;
        $this->RoadMapID = $RoadMapID;
        $this->Type = $Type;
        $this->Title = $Title;
        $this->LongDesc = $LongDesc;
    }
}
