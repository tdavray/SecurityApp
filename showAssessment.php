<?php
/*
 * Student 1 : Ayman Fattar
 * Student 2 : Theodore D'Avray
 * Student# 1 : 218327676
 * Student# 2 : 218327641
 * Declaration: This is my own work and
 *  any code obtained from other sources
 *  will be referenced
 */
?>

<?php


session_start();
require_once("controller/DBconn.php");
require_once("controller/functions.php");
require_once("include_meta.php");
include("Menu.php");


showAssessment($_SESSION['ID']);