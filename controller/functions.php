<?php

require_once "DBconn.php";

function logInForm($failed)
{

    if(isset($_POST['pers_data'])) {
        $pers_data = $_POST['pers_data'];
        $email = $pers_data[0];
    }
    else{
        $email = "";
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="<?= $_SERVER['SCRIPT_NAME']?>" method="post" role="form" style="display: block;">
                                    <h2>LOGIN</h2>

                                    <?php if ($failed) { ?>
                                        <label class="alert-danger">Can\'t authenticate user, please try again or <a href="register.php">register now</a>:</label>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input type = "email" name = "pers_data[]" id = "username" class="form-control" value = "<?= $email ?>" placeholder = "Enter your email" required autofocus >
                                    </div>
                                    <div class="form-group">
                                        <input type = "password" name = "pers_data[]" id = "password" class="form-control" placeholder = "Enter your password" required >
                                    </div>
                                    <div class="col-xs-6 form-group pull-right">
                                        <input type="submit" name="submitbtn" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                    </div>
                                </form >
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 tabs">
                                <a href="#" class="active" id="login-form-link"><div class="login">LOGIN</div></a>
                            </div>
                            <div class="col-xs-6 tabs">
                                <a href="register.php" id="register-form-link"><div class="register">REGISTER</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

function registerForm($failed)
{

    if(isset($_POST['pers_data'])) {
        $pers_data = $_POST['pers_data'];
        $name = $pers_data[0];
        $surname = $pers_data[1];
        $email = $pers_data[2];
    }
    else{
        $name = $surname = $email = "";
    }
?>
<form class="form-signin" action = "<?php $_SERVER["PHP_SELF"] ?>" method = "POST" >
    
                <h2 class="form-signin-heading" > Register </h2 >

<?php if ($failed == 1) { ?>
        <label class="alert-danger">Can\'t create user, email already used, please try again</label>
<?php }
    else if ($failed == 2) { ?>
        <label class="alert-danger">Wrong password, please try again</label>
<?php } ?>
                        <input type = "text" name = "pers_data[]" id = "Name" class="form-control form-control-lg" value = "<?= $name ?>" placeholder = "Enter a name" required autofocus >
                        </br >
                        <input type = "text" name = "pers_data[]" id = "Surname" class="form-control form-control-lg" value = "<?= $surname ?>" placeholder = "Enter a surname" required autofocus >
                        </br >
                        <input type = "email" name = "pers_data[]" id = "Email" class="form-control form-control-lg" value = "<?= $email ?>" placeholder = "Enter an email" required autofocus >
                        </br >
                        <input type = "password" name = "pers_data[]" id = "password1" class="form-control form-control-lg" placeholder = "Enter a password" required >
                        </br >
                        <input type = "password" name = "pers_data[]" id = "password2" class="form-control form-control-lg" placeholder = "Enter your password a second time" required >
                        </br >
                        <input type = "submit" name = "submitbtn" class="btn btn-block btn-lg btn-primary" value = "Register" >
                        
                        <a href="index.php">You Already have an account ? Login now</a>
            
                    </form >
<?php
}

function printUserInfo($info){
    if(isset($info[0]['userImage']) AND $info[0]['userImage'] != ""){ ?>
        <img src='img/<?= $info[0]['userImage'] ?>' alt='faceID' height='150' width='150'><br>
        <br>
<?php } ?>

    <h1 class='alert-info'>Hello <?= $info[0]["FName"] ?> <?= $info[0]["LName"] ?>, welcome</h1>
    <h2 class='alert-info'> Your email : <?= $info[0]["Email"] ?>

<?php if(isset($info[0]['CellNum']) AND $info[0]['CellNum'] != "") { ?>
        <h2 class='alert-info'> Your phone number : <?= $info[0]["CellNum"] ?>
<?php } ?>
    <br><br>
    <form action='studentsList.php'><input class="btn btn-primary" type='submit' value='Show Students'></form>


<?php
}
?>

<?php
/*function showStudents(){
    $bdd = co();
    $select = $bdd->prepare("SELECT * From tbl_User ");
    $select->execute();
    $info = $select->fetchAll();


    echo "
        <script>
            var sTableData = '';
            var iRow = 0;
            
            sTableData = '<table>';
            for(iRow=0;iRow<=" . count($info). ";iRow++)
            {
                sTableData = sTableData + '<tr><td>specify data you want show</td</tr>';
            }
            sTableData = sTableData + '</table>;
        
            document.getElementById('lblData').innerHTML = sTableData;
        </script>
    ";
}*/

?>