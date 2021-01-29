<?php
include_once dirname(__FILE__)."/../logo/logo.php";
include_once dirname(__FILE__)."/../nav/nav.php";

    class Header {
        public $User = false;
        function render() {
            $logo = (new Logo)->return();
            $nav = new Nav();
            $nav->User = $this->User;
            $nav = $nav->return();
            echo '
                <header class="header">
                    <div class="header__wrapper wrapper">
                        '.$logo.$nav.'
                    </div>
                </header>
            ';
        }
    }
?>