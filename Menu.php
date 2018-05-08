<?php
/**
 * Created by PhpStorm.
 * User: ayman
 * Date: 08/05/2018
 * Time: 20:49
 */
function Logout(){
    if (isset($_SESSION)){ print_r($_SESSION);
        session_unset();
        print_r($_SESSION);
        session_destroy();
        print_r($_SESSION);
    }
}
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
                <li><a href="#">Add Assessment</a></li>
            </ul>
        <?php } ?>
                <p class="navbar-text navbar-right">Signed in as <a href="editProfil.php" class="navbar-link"><?= $_SESSION["ID"] ?></a></p>
                <form action="index.php"><button type="submit" onclick="Logout()">Log out</button></form>
            <?php }
            else{ ?>
        <ul class="nav navbar-nav">
                <li><a class="navbar-right" href="index.php">Sign in</a></li>
        </ul>
            <?php } ?>


    </div>
</nav>
