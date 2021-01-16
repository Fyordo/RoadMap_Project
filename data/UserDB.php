<?php
include_once 'models/User.php';

class UserDB
{
    // Получить данные о пользователе по его ID
    public static function GetUserDataByID(int $ID)
    {
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = "SELECT * FROM `users` WHERE `ID`='$ID'";
        $result = mysqli_query($link, $sql);

        if (!$result){
            return null;
        }
        $row = mysqli_fetch_row($result);

        $User = new User();
        $User->ID = (int)$row[0];
        $User->Nickname = $row[1];
        $User->Login = $row[2];
        $User->Password = $row[3];
        $User->FavMapsIDS = explode("/", $row[4]);
        $User->IsSuperUser = (bool)$row[5];
        mysqli_close($link);

        return $User;
    }

    // Получить данные о пользователе по его логину
    public static function GetUserDataByLogin(string $Login){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = "SELECT * FROM `users` WHERE `Login`='$Login'";
        $result = mysqli_query($link, $sql);

        if (!$result){
            return null;
        }

        $row = mysqli_fetch_row($result);

        $User = new User();
        $User->ID = (int)$row[0];
        $User->Nickname = $row[1];
        $User->Login = $row[2];
        $User->Password = $row[3];
        $User->FavMapsIDS = explode("/", $row[4]);
        $User->IsSuperUser = (bool)$row[5];
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
            array_push($logins, $row[1]);
        }
        mysqli_close($link);

        return $logins;
    }

    // Проверить, существует ли такой логин в БД
    public static function LoginExists(string $Login){
        $Logins = self::GetAllLogins();
        return in_array($Login, $Logins);
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
