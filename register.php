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
        if(isset($_POST['pers_data'])){
            $pers_data = $_POST['pers_data'];
            $name = $pers_data[0];
            $surname = $pers_data[1];
            $ID_Student = $pers_data[2];
            $email = $pers_data[3];
            $password1 = $pers_data[4];
            $password2 = $pers_data[5];

            if($password1 != $password2){
                registerForm(2);
            }
            else{
                $md5_password = md5($password1);

                $bdd = co();
                $select = $bdd->prepare("SELECT COUNT(*) From Student 
                                            WHERE ID_student = ?");

                $select->execute(array($email));

                $exist = $select->fetchColumn(0);

                if($exist){
                    registerForm(1);
                }
                else{
                    $insert = $bdd->prepare('INSERT INTO Student(ID_student,FName,LName,Email,Password)
                                  VALUES (?,?,?,?,?);');
                    $insert->execute(array($ID_Student,$name,$surname,$email,$md5_password));
                    echo '<h1 class="bg-success">Registration success, click <a href="index.php">here</a> to log in</h1>';
                }
            }

        }
        else{
            registerForm(0);
        }


        ?>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
