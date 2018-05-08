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
    session_start();
    ?>

  </head>
  <body>


          <?php
              if(isset($_POST['pers_data'])){
                  $pers_data = $_POST['pers_data'];
                  $ID = $pers_data[0];
                  $password = $pers_data[1];

                  $md5_password = md5($password);

                  $_SESSION['ID'] = $ID;



                  $bdd = co();
                  if (preg_match("#^2#",$ID)) {
                      $select = $bdd->prepare("SELECT Password From Student
                                            WHERE ID_student = ?");

                      $select->execute(array($ID));
                      $info = $select->fetchAll();
                  }elseif (preg_match("#^1#",$ID)) {
                      $select = $bdd->prepare("SELECT Password From Lecturer
                                            WHERE ID_lecturer = ?");

                      $select->execute(array($ID));
                      $info = $select->fetchAll();
                  }
                  if(!empty($info) AND $md5_password == $info[0]["Password"]){
                      //Login Réussi
                      if (preg_match("#^2#",$ID)) {
                          $select = $bdd->prepare("SELECT * From Student 
                                            WHERE ID_student = ?");
                          $select->execute(array($ID));
                          $info = $select->fetchAll();
;                          printUserInfo($info);
                      }elseif (preg_match("#^1#",$ID)) {
                          $select = $bdd->prepare("SELECT * From Lecturer
                                            WHERE ID_lecturer = ?");
                          $select->execute(array($ID));
                          $info = $select->fetchAll();
                          printUserInfo($info);
                      }

                  }
                  else{
                      logInForm(true);
                  }

              }
              elseif (isset($_SESSION['ID'])){
                  $ID_Student = $_SESSION['ID'];
                  $bdd = co();
                  $select = $bdd->prepare("SELECT * From Student 
                                            WHERE ID_student = ?");

                  $select->execute(array($ID_Student));
                  $info = $select->fetchAll();

                  printUserInfo($info);
              }
              else{
                 logInForm(false);
              }


        ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
