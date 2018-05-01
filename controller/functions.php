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

    echo '<form class="form-signin" action = "'.$_SERVER["PHP_SELF"].'" method = "POST" >
    
                <h2 class="form-signin-heading" > Log in </h2 >';

    if ($failed) {
        echo '<label class="alert-danger">Can\'t authenticate user, please try again or <a href="register.php">register now</a>:</label>';
    }

        echo '<input type = "email" name = "pers_data[]" id = "Email" class="form-control form-control-lg" value = "'.$email.'" placeholder = "Enter your email" required autofocus >
                        </br >
                        <input type = "password" name = "pers_data[]" id = "password" class="form-control form-control-lg" placeholder = "Enter your password" required >
                        </br >
                        <input type = "submit" name = "submitbtn" class="btn btn-block btn-lg btn-primary" value = "Sign In" >
                        
                        <a href="register.php">or register now</a>
            
                    </form >';
}

function registerForm($failed)
{

    if(isset($_POST['pers_data'])) {
        $pers_data = $_POST['pers_data'];
        $name = $pers_data[0];
        $surname = $pers_data[1];
        $email = $pers_data[2];
    }
    else{
        $name = $surname = "";
    }

    echo '<form class="form-signin" action = "'.$_SERVER["PHP_SELF"].'" method = "POST" >
    
                <h2 class="form-signin-heading" > Register </h2 >';

    if ($failed == 1) {
        echo '<label class="alert-danger">Can\'t create user, email already used, please try again</label>';
    }
    else if ($failed == 2) {
        echo '<label class="alert-danger">Wrong password, please try again</label>';
    }


    echo '<input type = "text" name = "pers_data[]" id = "Name" class="form-control form-control-lg" value = "'.$name.'" placeholder = "Enter a name" required autofocus >
                        </br >
                        <input type = "text" name = "pers_data[]" id = "Surname" class="form-control form-control-lg" value = "'.$surname.'" placeholder = "Enter a surname" required autofocus >
                        </br >
                        <input type = "email" name = "pers_data[]" id = "Email" class="form-control form-control-lg" value = "'.$email.'" placeholder = "Enter an email" required autofocus >
                        </br >
                        <input type = "password" name = "pers_data[]" id = "password1" class="form-control form-control-lg" placeholder = "Enter a password" required >
                        </br >
                        <input type = "password" name = "pers_data[]" id = "password2" class="form-control form-control-lg" placeholder = "Enter your password a second time" required >
                        </br >
                        <input type = "submit" name = "submitbtn" class="btn btn-block btn-lg btn-primary" value = "Register" >
                        
                        <a href="index.php">You Already have an account ? Login now</a>
            
                    </form >';
}

function printUserInfo($info){
    if($info[0]['userImage'] != ""){
        echo "<img src='img/". $info[0]['userImage'] . "' alt='faceID' height='150' width='150'><br>";
        echo "<br>";
    }

    echo "<h1 class='alert-info'>Hello ". $info[0]["FName"] ." ". $info[0]["LName"] .", welcome</h1>";
    echo "<h2 class='alert-info'> Your email : ". $info[0]["Email"];

    if($info[0]['CellNum'] != "") {
        echo "<h2 class='alert-info'> Your phone number : " . $info[0]["CellNum"];
    }
    echo "<br><br>";
    echo "<form action='studentsList.php'> <input class=\"btn btn-primary\" type='submit' value='Show Students'> </form>";


}

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

