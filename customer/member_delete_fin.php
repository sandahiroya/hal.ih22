<?php
session_start();

if(empty($_SESSION['user'])){
    header("location: login.php");
}

session_unset();

require_once "member_tpl/member_delete_fin.php";