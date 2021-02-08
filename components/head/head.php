<?php
class Head {
    public $title = 'RoadMaps';
    function render() {
        echo '
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <link href="/styles/vendor/reset.css" rel="stylesheet" type="text/css" />
                <link rel="preconnect" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
                <link href="/styles/main.css" rel="stylesheet" type="text/css" />           
                <script src="https://use.fontawesome.com/a4906569c9.js"></script>
                <title>'.$this->title.'</title>
                <link rel="shortcut icon" href="/img/Icon.png" type="image/x-icon">
            </head>
        ';
    }
}

?>