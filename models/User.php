<?php 

class User{
    public $ID; // ID пользователя
    public $Nickname; // Имя пользователя
    public $Login; // Логин пользователя
    public $Password; // Пароль пользователя
    public $FavMapsIDS; // Список любимых дорожных карт
    public $IsSuperUser; // Является ли админом?

    public function __construct($ID, $Nickname, $Login, $Password, $FavMapsIDS, $IsSuperUser)
    {
        $this->ID = $ID;
        $this->Nickname = $Nickname;
        $this->Login = $Login;
        $this->Password = $Password;
        $this->FavMapsIDS = $FavMapsIDS;
        $this->IsSuperUser = $IsSuperUser;
    }
}

?>