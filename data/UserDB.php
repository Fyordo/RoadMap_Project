<?php
include_once 'models/User.php';

class UserDB
{
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
        $User->ID = (int)$row[0][0];
        $User->Nickname = $row[0][1];
        $User->Login = $row[0][2];
        $User->Password = $row[0][3];
        $User->FavMapsIDS = explode("/", $row[0][4]);
        $User->IsSuperUser = (bool)$row[0][5];
        mysqli_close($link);

        return $User;
    }

    public static function GetUserDataByLogin(string $Login){
        $link = mysqli_connect(DBConfiguration::$host, DBConfiguration::$user, DBConfiguration::$password, "roadmapproject", DBConfiguration::$port);

        $sql = "SELECT * FROM `users` WHERE `Login`='$Login'";
        $result = mysqli_query($link, $sql);

        if (!$result){
            return null;
        }

        $row = mysqli_fetch_row($result);

        $User = new User();
        $User->ID = (int)$row[0][0];
        $User->Nickname = $row[0][1];
        $User->Login = $row[0][2];
        $User->Password = $row[0][3];
        $User->FavMapsIDS = explode("/", $row[0][4]);
        $User->IsSuperUser = (bool)$row[0][5];
        mysqli_close($link);

        return $User;
    }

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

    public static function LoginExists(string $Login){
        $Logins = self::GetAllLogins();
        return in_array($Login, $Logins);
    }

    public static function SignUp(string $Login, string $Password){
        $user = self::GetUserDataByLogin($Login);
        return $user->Password == $Password;
    }
}
