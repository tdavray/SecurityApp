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

<header class="masthead text-white text-center">

    <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">

        <?php
        if(isset($_POST['pers_data'])){
            $pers_data = $_POST['pers_data'];
            $name = $pers_data[0];
            $surname = $pers_data[1];
            $email = $pers_data[2];
            $password1 = $pers_data[3];
            $password2 = $pers_data[4];

            if($password1 != $password2){
                registerForm(2);
            }
            else{
                $md5_password = md5($password1);

                $bdd = co();
                $select = $bdd->prepare("SELECT COUNT(*) From tbl_User 
                                            WHERE Email = ?");

                $select->execute(array($email));

                $exist = $select->fetchColumn(0);

                if($exist){
                    registerForm(1);
                }
                else{
                    $insert = $bdd->prepare('INSERT INTO tbl_User(FName,LName,Email,Password)
                                  VALUES (?,?,?,?);');
                    $insert->execute(array($name,$surname,$email,$md5_password));
                    echo '<h1 class="bg-success">Registration success, click <a href="index.php">here</a> to log in</h1>';
                }
            }

        }
        else{
            registerForm(0);
        }


        ?>

    </div>

</header>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
