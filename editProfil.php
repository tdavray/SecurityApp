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
if(isset($_SESSION['ID'])) {
    $bdd = co();
    $ID = $_SESSION['ID'];
    if (preg_match("#^2#", $ID)) {
        $select = $bdd->prepare("SELECT * From Student 
                                            WHERE ID_student = ?");
        $select->execute(array($ID));
        $info = $select->fetchAll();
        $pers_data = $info[0];
        $name = $pers_data[0];
        $surname = $pers_data[1];
        $email = $pers_data[3];
    } elseif (preg_match("#^1#", $ID)) {
        $select = $bdd->prepare("SELECT * From Lecturer
                                            WHERE ID_lecturer = ?");
        $select->execute(array($ID));
        $info = $select->fetchAll();
        $pers_data = $info[0];
        $name = $pers_data[0];
        $surname = $pers_data[1];
        $email = $pers_data[3];
    }

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
                                    <input type = "text" name = "pers_data[]" id = "Name" class="form-control form-control-lg" disabled value = "<?= $name ?>" placeholder = "Enter a name" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type = "text" name = "pers_data[]" id = "Surname" class="form-control form-control-lg" disabled value = "<?= $surname ?>" placeholder = "Enter a surname" required autofocus >
                                </div>
                                <div class="form-group">
                                    <input type="number" name="pers_data[]" id="username"
                                           class="form-control form-control-lg" disabled value="<?= $ID ?>"
                                           placeholder="Enter your email" required autofocus>
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
                                    <input type = "submit" name = "submitbtn" class="btn btn-block btn-lg btn-register" value = "Update profile" >
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
    $ID = $_SESSION['ID'];
    $email = $pers_data[3];
    $password = md5($pers_data[5]);
    if($md5_password == $info[0]["Password"]) {
        if (preg_match("#^2#", $ID)) {
            $select = $bdd->prepare("UPDATE student SET Password =  $newPassword  WHERE ID_student = ?");

            $select->execute(array($ID));
            $info = $select->fetchAll();
        } elseif (preg_match("#^1#", $ID)) {
            $select = $bdd->prepare("UPDATE lecturer SET Password =  $newPassword  WHERE ID_lecturer = ?");

            $select->execute(array($ID));
            $info = $select->fetchAll();
        }
    }
}else
    header("location:index.php");?>