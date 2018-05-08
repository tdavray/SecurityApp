<?php
/**
 * Created by PhpStorm.
 * User: ayman
 * Date: 09/05/2018
 * Time: 00:43
 */

session_start();
require_once "controller/DBconn.php";
require_once "controller/functions.php";
include("include_meta.php");

if(isset($_SESSION['ID'])){
    $ID = $_SESSION['ID'];
    if(preg_match("#^1#",$ID)){
        addAssessmentFrom();
    }
}