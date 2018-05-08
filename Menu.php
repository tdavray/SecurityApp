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
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
            <?php
            if(isset($_SESSION["ID"])){ ?>
                <p class="navbar-text navbar-right">Signed in as <a href="editProfil.php" class="navbar-link"><?= $_SESSION["ID"] ?></a></p>
            <?php }
            else{ ?>
                <li><a class="navbar-right" href="index.php">Sign in</a></li>
            <?php } ?>
        </ul>

    </div>
</nav>
