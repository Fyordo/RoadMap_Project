<?php
include_once '../models/User.php';
include_once 'config.php';
session_start();

class UserDB
{

    // Получить данные о пользователе по его логину
    public static function GetUserDataByLogin(string $Login){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        $sql = "SELECT * FROM `users` WHERE `Login`='$Login'";
        $result = mysqli_query($link, $sql);
        
        $row = mysqli_fetch_row($result);
        $User = new User($row[0], $row[1], $row[2], $row[3], explode("/", $row[4]), $row[5]);
        mysqli_close($link);

        return $User;
    }

    // Получить все логины из базы данных
    public static function GetAllLogins(){
        $logins = [];
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($link, $sql);

        $CountRows = mysqli_num_rows($result);

        for ($i = 0; $i < $CountRows; $i++){
            $row = mysqli_fetch_row($result);
            array_push($logins, $row[2]);
        }
        mysqli_close($link);

        return $logins;
    }

    // Проверить, существует ли такой логин в БД
    public static function LoginExists(string $Login){
        $Logins = self::GetAllLogins();
        for ($i = 0; $i < count($Logins); $i++){
            if ($Logins[$i] == $Login){
                return true;
            }
        }
        return false;
    }

    // True, если пользователь авторизовался, False, если неправильно ввёл пароль.
    public static function IsSignedUp(string $Login, string $Password){
        $user = self::GetUserDataByLogin($Login);
        return $user->Password == $Password;
    }

    // Регистрация нового пользователя
    public static function AddNewUser(string $Nickname, string $Login, string $Password){
        if (in_array($Login, self::GetAllLogins())){
            return "Такой пользователь уже есть";
        }

        $NewID = -1;

        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = "SELECT * FROM `users`";
        $result = mysqli_query($link, $sql);

        $CountRows = mysqli_num_rows($result);

        for ($i = 0; $i < $CountRows; $i++){
            $row = mysqli_fetch_row($result);
            $NewID = $row[0];
        }

        $NewID++;

        $sql = "INSERT INTO `users` (`ID`, `Nickname`, `Login`, `Password`, `FavMapsIDS`, `IsSuperUser`) VALUES ('$NewID',  '$Nickname', '$Login', '$Password', '', '0')";
        $result = mysqli_query($link, $sql);

        mysqli_close($link);
    }
}
