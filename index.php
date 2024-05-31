<?php
date_default_timezone_set('Asia/Yekaterinburg');
require "dbconnect.php";
require "auth.php";
require "menu.php";
echo '<main class="container" style="margin-top: 100px">';
switch ($_GET['page']){
    case 'c':
        if (isset($_SESSION['login'])) {
            require "corpus.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра корпусов';
        }
        break;
    case 'g':
        if (isset($_SESSION['login'])) {
            require "guest.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра гостей';
        }
        break;
    case 'l':
        if (isset($_SESSION['login'])) {
            require "lodging.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра проживания';
        }
        break;
    case 'r':
        if (isset($_SESSION['login'])) {
            require "room.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра проживания';
        }
        break;
    case 'b':
        if (isset($_SESSION['login'])) {
            require "booking.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра бронирования';
        }
        break;
    case 'ag':
        if (isset($_SESSION['login'])) {
            require "addguest.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра бронирования';
        }
        break;
    case 'ab':
        if (isset($_SESSION['login'])) {
            require "addbooking.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра бронирования';
        }
        break;
    case 'al':
        if (isset($_SESSION['login'])) {
            require "addlodging.php";
        }
        else{
            $msg = 'Войдите в систему для просмотра бронирования';
        }
        break;
    default:
        echo '<div class="alert alert-info">Добро пожаловать! Пожалуйста, войдите в аккаунт.</div>';
        break;
}
echo '</main>';

if(($_SESSION['msg']!='') or isset($msg)) {
    require "message.php";
    $_SESSION['msg']= '';
}

require "footer.php";
?>