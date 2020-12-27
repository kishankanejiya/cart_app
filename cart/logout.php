<?php
session_start();
if(!isset($_SESSION['uname']) && isset($_SESSION['password']))
{
    header('location:index.php');
}
session_destroy();
header('location:index.php');


?>