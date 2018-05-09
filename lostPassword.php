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
require_once("controller/DBconn.php");
require_once("controller/functions.php");
require_once("include_meta.php");
include("Menu.php");

if (isset($_POST['ID'])) {
    $bdd = co();
    $ID = $_POST['ID'];
    if (preg_match("#^2#", $ID)) {
        $select = $bdd->prepare("SELECT * From Student 
                                            WHERE ID_student = ?");
        $select->execute(array($ID));
        $info = $select->fetchAll();
        print_r($info);
    } elseif (preg_match("#^1#", $ID)) {
        $select = $bdd->prepare("SELECT * From Lecturer
                                            WHERE ID_lecturer = ?");
        $select->execute(array($ID));
        $info = $select->fetchAll();
        print_r($info);
    }
    $newPassword = generateRandomString();
    mail($info['Email'], "Reset Password", "HellpYour new password is $newPassword");
    if (preg_match("#^2#", $ID)) {
        $select = $bdd->prepare("UPDATE student SET Password =  $newPassword  WHERE ID_student = ?");

        $select->execute(array($ID));
        $info = $select->fetchAll();
    } elseif (preg_match("#^1#", $ID)) {
        $select = $bdd->prepare("UPDATE lecturer SET Password =  $newPassword  WHERE ID_lecturer = ?");

        $select->execute(array($ID));
        $info = $select->fetchAll();
    }
} else {
    recoverPassword();
}


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}