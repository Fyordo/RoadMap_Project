<?php 
class Form {
    public $type;
    public $message;
    
    function render() {
        if ($this->type == 'login') {
            echo '
            <form action="/User/signin.php" method="post" enctype="multipart/form-data">
                <label for="login">Логин</label>
                <input id="login" name="login">
                <label for="pass">Пароль</label>
                <input id="pass" name="password">
                <button>Войти</button>
                <p>
                    У вас нет аккаунта? <a href="/User/Register.php">Зарегистрируйтесь</a>
                </p>
        
                <p>
                    '.$this->message.'
                </p>
            </form>
            ';
        } else if ($this->type == 'reg') {
            echo '
                <form action="/User/signup.php" method="post" enctype="multipart/form-data">
                    <label for="nick">Никнейм</label>
                    <input id="nick" name="nickname">
                    <label for="login">Логин</label>
                    <input id="login" name="login">
                    <label for="pass">Пароль</label>
                    <input id="pass" name="password">
                    <label for="confirmPass">Подтверждение пароля</label>
                    <input id="confirmPass" name="confirm_password">
                    <button>Регистрация</button>
                    <p>
                        У вас уже есть аккаунт? <a href="/User/SignInPage.php">Войдите</a>
                    </p>

                    <p>
                        '.$this->message.'
                    </p>
                </form>
            ';
        }
    }
}
?>