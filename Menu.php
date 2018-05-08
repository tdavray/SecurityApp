<?php
/**
 * Created by PhpStorm.
 * User: ayman
 * Date: 08/05/2018
 * Time: 20:49
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
        <?php } ?>

                <ul class="nav navbar-nav">
                    <li><p class="navbar-text navbar-right">Signed in as <a href="editProfil.php" class="navbar-link"><?= $_SESSION["ID"] ?></a></p>
                </li>                   <li><a class="navbar-right" href="Logout.php">Log out</a></li>
                </ul>
            <?php }
            else{ ?>
        <ul class="nav navbar-nav">
                <li><a class="navbar-right" href="index.php">Sign in</a></li>
        </ul>
            <?php } ?>


    </div>
</nav>
