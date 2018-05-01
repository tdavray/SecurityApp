<?php

require_once "DBconn.php";

$bdd = co();

$result = $bdd->query("SHOW TABLES LIKE 'tbl_User'")->rowCount() > 0;

if($result)
    $bdd->query("DROP TABLE tbl_User");

$bdd->query("CREATE TABLE tbl_User
                          (ID smallint (6) primary key auto_increment,
                          FName varchar(30),
                          LName varchar(30),
                          Email varchar(30),
                          CellNum varchar(30),
                          Password varchar(100),
                          userImage varchar(30))");

$userData = file ("../files/userData.txt",FILE_IGNORE_NEW_LINES);

foreach ($userData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);

    $insert = $bdd->prepare('INSERT INTO tbl_User(FName,LName,Email,Password) 
                              VALUES (?,?,?,?);');
    $insert->execute(array($value[0],$value[1],$value[2],$value[3]));
}


