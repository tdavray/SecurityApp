<!DOCTYPE html>
<html lang="en">

<!--
    Théodore d'Avray
    Student number : 218327641
-->

<head>

    <?php

    require_once ("controller/DBconn.php");
    require_once ("controller/functions.php");
    require_once ("include_meta.php");
    include ("Menu.php");

    ?>

</head>

<body>
<div class="container-fluid">
<div class="panel panel-primary">
    <!-- Default panel contents -->
    <div class="panel-heading">List of students</div>

    <!-- Table -->
    <table class="table">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Cell number</th>
            <th>Picture</th>
        </tr>

        <?php

        $bdd = co();
        $select = $bdd->prepare("SELECT * From Student ");

        $select->execute();
        $info = $select->fetchAll();

        foreach($info as $index => $values){
            ?>
            <tr>
                    <td> <?= $values['FName'] ?></td>
                    <td><?= $values['LName'] ?></td>
                    <td><?= $values['Email'] ?></td>
                    <td><?= $values['CellNum'] ?></td>
                    <td>
                    <button>
                        <?php
            if(!$values['userImage'] ){
                           ?>
                        <img height="70,width=60" src="img/30.jpg" onclick="window.open(this.src,'_blank', 'location=yes,height=500,width=500,status=yes')">
                         <?php
            } else{ ?>
                            <img height="70,width=60" src="img/<?= $values['userImage']?>.jpg" onclick="window.open(this.src,'_blank', 'location=yes,height=500,width=500,status=yes')">
                       <?php }
                    ?>
                    </button>
                    </td>
                  </tr>
        <?php } ?>
    </table>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</body>
</html>