<?php 

class User{
    public $ID; // ID пользователя
    public $Nickname; // Имя пользователя
    public $Login; // Логин пользователя
    public $Password; // Пароль пользователя
    public $FavMapsIDS; // Список любимых дорожных карт
    public $IsSuperUser; // Является ли админом?
    public $CompletedNodes; // Список пройденных пунктов

    public function __construct($ID, $Nickname, $Login, $Password, $FavMapsIDS, $IsSuperUser, $CompletedNodes)
    {
        $this->ID = $ID;
        $this->Nickname = $Nickname;
        $this->Login = $Login;
        $this->Password = $Password;
        $this->FavMapsIDS = array_slice($FavMapsIDS, 0, count($FavMapsIDS)-1);
        $this->IsSuperUser = $IsSuperUser;
        $this->CompletedNodes = array_slice($CompletedNodes, 0, count($CompletedNodes)-1);
    }
}

?>