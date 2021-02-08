<?php 
class Form {
    public $type;
    public $message;
    
    function render() {
        if ($this->type == 'login') {
            echo '
            <div class="login-page">
                <div class="form">
                    <form class="login-form" action="/User/signin.php" method="post" enctype="multipart/form-data">
                        <input id="login" type="text" placeholder="Логин" name="login"/>
                        <input id="pass" type="password" placeholder="Пароль" name="password"/>
                        <button>Войти</button>
                        <p class="message">У вас нет аккаунта? <a href="/User/Register.php">Зарегистрируйтесь</a></p>
                        <p class="message">'.$this->message.'</p>
                    </form>
                </div>
            </div>
            ';
        } else if ($this->type == 'reg') {
            echo '
            <div class="login-page">
                <div class="form">
                    <form class="register-form" action="/User/signup.php" method="post" enctype="multipart/form-data">
                        <input id="nick" name="nickname" placeholder="Никнейм" name="nickname">
                        <input id="login" type="text" placeholder="Логин" name="login"/>
                        <input id="pass" type="password" placeholder="Пароль" name="password"/>
                        <input id="confirmPass" type="password" placeholder="Подтверждение пароля" name="confirm_password"/>
                        <button>Зарегистрироваться</button>
                        <p class="message">У вас уже есть аккаунт? <a href="/User/SignInPage.php">Войдите</a></p>
                        <p class="message">'.$this->message.'</p>
                    </form>
                </div>
            </div>
            ';
        }
    }
}
?>