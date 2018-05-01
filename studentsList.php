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

    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Students Log In</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fontas for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $bdd = co();
        $select = $bdd->prepare("SELECT * From tbl_User ");

        $select->execute();
        $info = $select->fetchAll();

        foreach($info as $index => $values){
            echo "<tr>
                    <th>". $values['FName'] ."</th>
                    <th>". $values['LName'] ."</th>
                    <th>". $values['Email'] ."</th>
                    <th>". $values['CellNum'] ."</th>
                    <th>
                    <a class=\"img\" onclick=\"window.open('img/". $values['userImage'] . "', '_blank', 'location=yes,height=500,width=500,status=yes');\" >
                    <img src='img/". $values['userImage'] . "' alt='face' border=3 height=100 width=100>
                    </a>
                    </th>
                  </tr>";
        }

        ?>
        </tbody>
    </table>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
