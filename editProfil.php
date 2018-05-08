<?php
/**
 * Created by PhpStorm.
 * User: ayman
 * Date: 08/05/2018
 * Time: 21:18
 */
?>
<!DOCTYPE html>
<html lang="en">

<!--
    Théodore d'Avray
    Student number : 218327641
-->

<head>

    <?php

    require_once "controller/DBconn.php";
    require_once "controller/functions.php";
    include("include_meta.php");

    ?>

</head>
<body>
<?php
include ("Menu.php");
session_start();
print_r($_SESSION);
if(isset($_SESSION)) {

    $bdd = co();
    $ID_Student = $_SESSION['ID'];

    $select = $bdd->prepare("SELECT * From Student 
                                            WHERE ID_student = ?");

    $select->execute(array($ID_Student));
    $info = $select->fetchAll();

    $pers_data = $info[0];
    $name = $pers_data[0];
    $surname = $pers_data[1];
    $email = $pers_data[3];
?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-signin" action = "<?php $_SERVER["PHP_SELF"] ?>" method = "POST" style="display: block">

                                <h2 class="form-signin-heading" > Edit profil </h2 >
                                <div class="form-group">
                                    <input type = "text" name = "pers_data[]" id = "Name" class="form-control form-control-lg" value = "<?= $name ?>" placeholder = "Enter a name" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type = "text" name = "pers_data[]" id = "Surname" class="form-control form-control-lg" value = "<?= $surname ?>" placeholder = "Enter a surname" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type = "number" name = "pers_data[]" id = "username" class="form-control" value = "<?= $ID_Student ?>" placeholder = "Enter your email" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type = "email" name = "pers_data[]" id = "Email" class="form-control form-control-lg" value = "<?= $email ?>" placeholder = "Enter an email" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type = "password" name = "pers_data[]" id = "password1" class="form-control form-control-lg" placeholder = "Enter a password" required >
                                </div>
                                <div class="form-group">
                                    <input type = "password" name = "pers_data[]" id = "password2" class="form-control form-control-lg" placeholder = "Confirm your password" required >
                                </div>
                                <div class="col-xs-6 form-group pull-right">
                                    <input type = "submit" name = "submitbtn" class="btn btn-block btn-lg btn-register" value = "Register" >
                                </div>


                            </form >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }elseif (isset($_POST['$pers_data[]'])){
    $bdd = co();
    $ID_Student = $_SESSION['ID'];
    $password = md5($pers_data[5]);

    $select = $bdd->prepare("UPDATE student SET Password =  $password WHERE ID_student = ?");

    $select->execute(array($ID_Student));
    $info = $select->fetchAll();

} ?>