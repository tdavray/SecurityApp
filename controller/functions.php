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

require_once "DBconn.php";

function logInForm($failed)
{
    include ("Menu.php");
    if(isset($_POST['pers_data'])) {
        $pers_data = $_POST['pers_data'];
        $ID_Student = $pers_data[0];
    } else{
        $ID_Student = "";
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
                                        <label class="alert-danger">Can't authenticate user, please try again or <a href="register.php">register now</a>:</label>
                                    <?php }else{ ?>
                                        <div class="form-group">
                                            <input type="text" name="pers_data[]" id="username" class="form-control"
                                                   value="<?= $ID_Student ?>" placeholder="Enter your student number"
                                                   required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="pers_data[]" id="password" class="form-control"
                                                   placeholder="Enter your password" required>
                                        </div>
                                        <div class="text-center">
                                            <h2>Lost your password, <a href="lostPassword.php">recover now !</a></h2>
                                        </div>
                                        <div class="col-xs-6 form-group pull-right">
                                            <input type="submit" name="submitbtn" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Log In">
                                        </div><?php } ?>
                                </form >
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 tabs">
                                <a href="#" class="active" id="login-form-link">
                                    <div class="login">LOGIN</div>
                                </a>
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
    include ("Menu.php");
    if(isset($_POST['pers_data'])) {
        $pers_data = $_POST['pers_data'];
        $name = $pers_data[0];
        $surname = $pers_data[1];
        $ID_Student = $pers_data[2];
        $email = $pers_data[3];
    } else{
        $name = $surname = $email = $ID_Student = "";
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-signin" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST"
                                      style="display: block">

                                    <h2 class="form-signin-heading"> Register </h2>

                                    <?php if ($failed == 1) { ?>
                                        <label class="alert-danger">Can't create user, email already used, please try
                                            again</label>
                                    <?php } else if ($failed == 2) { ?>
                                        <label class="alert-danger">Wrong password, please try again</label>
                                    <?php } ?>
                                    <div class="form-group">
                                        <input type="text" name="pers_data[]" id="Name"
                                               class="form-control form-control-lg" value="<?= $name ?>"
                                               placeholder="Enter a name" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="pers_data[]" id="Surname"
                                               class="form-control form-control-lg" value="<?= $surname ?>"
                                               placeholder="Enter a surname" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="pers_data[]" id="username" class="form-control"
                                               value="<?= $ID_Student ?>" placeholder="Enter your email" required
                                               autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="pers_data[]" id="Email"
                                               class="form-control form-control-lg" value="<?= $email ?>"
                                               placeholder="Enter an email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pers_data[]" id="password1"
                                               class="form-control form-control-lg" placeholder="Enter a password"
                                               required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="pers_data[]" id="password2"
                                               class="form-control form-control-lg" placeholder="Confirm your password"
                                               required>
                                    </div>
                                    <div class="col-xs-6 form-group pull-right">
                                        <input type="submit" name="submitbtn" class="btn btn-block btn-lg btn-register"
                                               value="Register">
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 tabs">
                                <a href="index.php" class="active" id="login-form-link">
                                    <div class="login">LOGIN</div>
                                </a>
                            </div>
                            <div class="col-xs-6 tabs">
                                <a href="register.php" id="register-form-link">
                                    <div class="register">REGISTER</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function printUserInfo($info)

{ include ("Menu.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Detail</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3">

                                <?php if (!empty($info)){
                                if (isset($info[0]['userImage']) AND $info[0]['userImage'] != "") { ?>
                                    <img class="img-circle img-responsible" src="img/<?= $info[0]['userImage'] ?>"
                                         alt='faceID' height='150' width='150'><br>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>


                                    </tr>
                                    <tr>
                                        <?php if (preg_match("#^2#", $_SESSION['ID'])) { ?>
                                            <td>First name :</td>
                                            <td><?= $info[0]["FName"] ?></td>
                                        <?php } elseif (preg_match("#^1#", $_SESSION['ID'])) { ?>
                                            <td>First name :</td>
                                            <td><?= $info[0]["Fname"] ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Last name :</td>
                                        <td><?= $info[0]["LName"] ?></td>
                                    </tr>
                                    <tr>
                                        <?php if (preg_match("#^2#", $_SESSION['ID'])) { ?>
                                            <td>Student number :</td>
                                            <td><?= $info[0]["ID_student"] ?></td>
                                        <?php } elseif (preg_match("#^1#", $_SESSION['ID'])) { ?>
                                            <td>Lecturer number :</td>
                                            <td><?= $info[0]["ID_lecturer"] ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td>Email address :</td>
                                        <td><?= $info[0]["Email"] ?></td>
                                    </tr>
                                    <?php if (isset($info[0]['CellNum']) AND $info[0]['CellNum'] != "") { ?>
                                        <tr>
                                            <td>Phone number :</td>
                                            <td><?= $info[0]["CellNum"] ?></td>
                                        </tr>
                                    <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>


    <?php
}
function addAssessmentFrom()
{
    require_once("Menu.php");
    $bdd = co();

    if (!isset($_POST['data'])) {

        $selectStudent = $bdd->prepare("SELECT ID_student,FName,LName From Student ");
        $selectStudent->execute();
        $students = $selectStudent->fetchAll();

        $selectSubject = $bdd->prepare("SELECT * From Subject ");
        $selectSubject->execute();
        $subjects = $selectSubject->fetchAll();

        $selectVenue = $bdd->prepare("SELECT ID_venue From Venue ");
        $selectVenue->execute();
        $venues = $selectVenue->fetchAll();

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-signin" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">

                                        <h2 class="form-signin-heading"> Add a new assessment </h2>
                                        <div class="form-group">
                                            <label for="student">Select the student : </label>
                                            <select name="data[student]" id="student">
                                                <?php
                                                foreach ($students as $student) {
                                                    ?>
                                                    <option value="<?php echo $student['ID_student'] ?>"><?php echo $student['FName'] . " " . $student['LName'] . " (" . $student['ID_student'] . ")" ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">Select the subject : </label>
                                            <select name="data[subject]" id="subject">
                                                <?php
                                                foreach ($subjects as $subject) {
                                                    ?>
                                                    <option value="<?php echo $subject['SubCode'] ?>"><?php echo $subject['SubName'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="venue">Select the venue : </label>
                                            <select name="data[venue]" id="venue">
                                                <?php
                                                foreach ($venues as $venue) {
                                                    ?>
                                                    <option value="<?php echo $venue['ID_venue'] ?>"><?php echo $venue['ID_venue'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date_asm">Choose the date : </label>
                                            <input type="date" name="data[date_asm]" id="date_asm" required>
                                        </div>
                                        <div class="col-xs-6 form-group pull-right">
                                            <input type="submit" name="submitbtn" value="Add">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        $insert = $bdd->prepare('INSERT INTO assessment(date_asm,ID_student,SubCode,ID_venue)
                              VALUES (?,?,?,?);');

        $insert->execute(array($_POST['data']['date_asm'], $_POST['data']['student'], $_POST['data']['subject'], $_POST['data']['venue']));
        $_POST['data'] = NULL;
        addAssessmentFrom();
    }

}  ?>



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

function showAssessment($id)
{
    $bdd = co();

    $select = $bdd->prepare("SELECT a.Mark,a.ID_venue,s.SubName, le.LName From Assessment a, Subject s, lecturing lg, lecturer le WHERE a.SubCode = s.SubCode
                                                                                          AND s.SubCode = lg.SubCode
                                                                                          AND lg.ID_Lecturer = le.ID_Lecturer
                                                                                          AND ID_student = ? ");
    $select->execute(array($id));
    $assessments = $select->fetchAll();

    ?>
    <div class="container-fluid">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">List of assessments</div>
            <table class="table">
                <tr>
                    <th>Subject</th>
                    <th>Venue</th>
                    <th>Lecturer</th>
                    <th>Mark</th>
                </tr>
                <?php
                foreach ($assessments as $assessment) {

                    ?>
                    <tr>
                        <td> <?= $assessment['SubName'] ?></td>
                        <td> <?= $assessment['ID_venue'] ?></td>
                        <td> <?= $assessment['LName'] ?></td>
                        <td> <?= $assessment['Mark'] ?></td>
                    </tr>

                    <?php
                } ?>
            </table>
        </div>
    </div>
    <?php

}

function showSubject($id)
{
    $bdd = co();
    ?>
    <div class="container-fluid">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading">List of subjects</div>
            <table class="table">
                <tr>
                    <th>Subject code</th>
                    <th>Subject Name</th>
                </tr>
                <?php

                if (preg_match("#^1#",$id)){
                    $select = $bdd->prepare("SELECT s.* FROM lecturing l,Subject s WHERE s.SubCode = l.SubCode
                                                                                          AND   l.ID_lecturer = ?");
                    $select->execute(array($id));
                    $subjects = $select->fetchAll();
                } else{
                    $select = $bdd->prepare("SELECT s.* FROM enrolled_for e,Subject s WHERE s.SubCode = e.SubCode
                                                                                          AND   e.ID_student = ?");
                    $select->execute(array($id));
                    $subjects = $select->fetchAll();
                }

                foreach($subjects as $subject){
                    ?>
                    <tr>
                        <td> <?= $subject['SubCode'] ?></td>
                        <td> <?= $subject['SubName'] ?></td>
                    </tr>
                    <?php
                } ?>
            </table>
        </div>
    </div>
    <?php
}

function recoverPassword()
{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" role="form"
                                      style="display: block;">
                                    <h2>RECOVER PASSWORD</h2>
                                    <div class="form-group">
                                        <input type="text" name="ID" tabindex="1" class="form-control"
                                               placeholder="ID number">
                                    </div>
                                    <div class="col-xs-6 form-group pull-right">
                                        <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                               class="form-control btn btn-login" value="Send me password">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>


