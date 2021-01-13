<?php

class FullRoadMap{
    public $ID;
    public $Name;
    public $CategoryID;
    public $IsPopular;
    public $ShortDesc;
    public $LongDesc;

    public $Nodes;
    public $CategoryName;

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

    public function AddNode(?RoadMapNode $Node){
        array_push($this->Nodes, $Node);
    }

    public function GetChildren(?RoadMapNode $Parent){
        $Ans = [];
        for ($i = 0; $i < count($this->Nodes); $i++){
            if ($this->Nodes[$i]->ParentID == $Parent->ID){
                array_push($Ans, $this->Nodes[$i]);
            }
        }
        return $Ans;
    }
}
