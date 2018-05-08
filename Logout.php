<?php
/**
 * Created by PhpStorm.
 * User: ayman
 * Date: 09/05/2018
 * Time: 00:11
 */

session_start();
session_unset();
session_destroy();

header("location:index.php");
exit();