<?php
include_once dirname(__FILE__)."/../config/services.php";
include_once dirname(__FILE__) . "/../config/db_connection.php";
session_start();

class UserDB
{

    // Получить данные о пользователе по его логину
    public static function GetUserDataByLogin(string $Login){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        $sql = "SELECT * FROM `users` WHERE `Login`='$Login'";
        $UserInfo = mysqli_query($link, $sql);
        
        $row = mysqli_fetch_row($UserInfo);
        $User = new User($row[0], $row[1], $row[2], $row[3], [], $row[4], []);

        $sql = "SELECT * FROM `usersfavorites` WHERE `UserID`='$User->ID'";
        $Favorites = mysqli_query($link, $sql);

        $CountRows = mysqli_num_rows($Favorites);
        if ($CountRows > 0){
            for ($i = 0; $i < $CountRows; $i++){
                $row = mysqli_fetch_row($Favorites);
                array_push($User->FavMapsIDS, $row[1]);
            }
        }

        $sql = "SELECT * FROM `usersnodes` WHERE `UserID`='$User->ID'";
        $Nodes = mysqli_query($link, $sql);

        $CountRows = mysqli_num_rows($Nodes);
        if ($CountRows > 0){
            for ($i = 0; $i < $CountRows; $i++){
                $row = mysqli_fetch_row($Nodes);
                array_push($User->CompletedNodes, $row[1]);
            }
        }

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

        $sql = "INSERT INTO `users` (`ID`, `Nickname`, `Login`, `Password`, `IsSuperUser`) VALUES ('$NewID', '$Nickname', '$Login', '$Password', '0')";
        $result = mysqli_query($link, $sql);

        mysqli_close($link);
    }

    public static function AddFavMap($UserID, $NewID){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        $sql = "INSERT INTO `usersfavorites` (`UserID`, `RoadMapID`) VALUES ('$UserID', '$NewID')";
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
    }

    public static function DeleteFavMap($UserID, $MapID){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        $sql = "DELETE FROM `usersfavorites` WHERE `UserID`='$UserID' AND `RoadMapID`='$MapID'";
        $result = mysqli_query($link, $sql);
        mysqli_close($link);
    }

    public static function AddCompletedNodes($UserID, $IDNodesArray){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        foreach ($IDNodesArray as $nodeID){
            $sql = "INSERT INTO `usersnodes` (`UserID`, `NodeID`) VALUES ('$UserID', '$nodeID')";
            $result = mysqli_query($link, $sql);
        }

        mysqli_close($link);
    }

    public static function DeleteCompletedNodes($UserID, $Erase){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);
        foreach ($Erase as $nodeID){
            $sql = "DELETE FROM `usersnodes` WHERE `UserID`='$UserID' AND `NodeID`='$nodeID'";
            $result = mysqli_query($link, $sql);
        }
        mysqli_close($link);
    }
}
