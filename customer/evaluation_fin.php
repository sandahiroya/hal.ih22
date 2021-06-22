<?php

session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}

unset($_SESSION['comment']);
unset($_SESSION['evaluation']);

require_once "./tpl/evaluation_fin.php";