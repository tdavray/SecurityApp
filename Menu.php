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

<nav class="navbar navbar-default">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            if(isset($_SESSION["ID"])){
                $ID = $_SESSION['ID'];
                ?>
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Profil<span class="sr-only"></span></a></li>
                    <li><a href="studentsList.php">Show students</a></li>
                </ul>
        <?php if (preg_match("#^1#",$ID)){ ?>
            <ul class="nav navbar-nav">
                <li><a href="addAssessment.php">Add Assessment</a></li>
            </ul>
                <?php } elseif (preg_match("#^2#", $ID)) { ?>
                    <ul class="nav navbar-nav">
                        <li><a href="showAssessment.php">Show Assessment</a></li>
                    </ul>
                <?php } ?>
                <ul class="nav navbar-nav">
                    <li><a href="showSubject.php">Show my subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><p class="navbar-text">Signed in as <a href="editProfil.php"
                                                               class="navbar-link"><?= $_SESSION["ID"] ?></a></p></li>
                    <li><a href="Logout.php">Log out</a></li>
                </ul>
            <?php }
            else{ ?>
        <ul class="nav navbar-nav">
                <li><a class="navbar-right" href="index.php">Sign in</a></li>
        </ul>
            <?php } ?>


    </div>
</nav>
