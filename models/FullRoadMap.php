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

    public function __construct($id = null, $name = null, $categoryId = null, $nodes = null, $isPopular = null, $ShortDesc = null, $LongDesc = null)
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
        return count($this->Nodes);
    }

    public function GetNodeByID($id)
    {
        foreach ($this->Nodes as $node){
            if ($node->ID == $id){
                return $node;
            }
        }
    }

    public function GetNextLayerByNodeID($nodeID): array
    {
        $arr = [];
        foreach ($this->Nodes as $curr_node){
            if ($curr_node->ParentID == $nodeID){
                array_push($arr, $curr_node);
            }
        }
        return $arr;
    }

    public function ChildrenCompleted($ParentID, $completed): bool
    {
        $children = $this->GetNextLayerByNodeID($ParentID);
        foreach ($children as $child){
            if (!in_array($child->ID, $completed)){
                return false;
            }
        }
        return true;
    }

    public function GetParentsIDS($nodeID) : array
    {

        $NodeParent = $this->GetNodeByID($this->GetNodeByID($nodeID)->ParentID);
        $res = [];

        while ($NodeParent->Type != "b"){
            array_push($res, $NodeParent->ID);
            $NodeParent = $this->GetNodeByID($this->GetNodeByID($NodeParent->ID)->ParentID);
        }

        return $res;
    }
}
