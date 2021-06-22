<?php

if(!empty($_POST['top'])){
    header("location: login.php");
}

// session_destroy();

require_once "tpl/comp_insert.php";
