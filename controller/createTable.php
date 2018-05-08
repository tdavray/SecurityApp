<?php

require_once "DBconn.php";

$bdd = co();

/*$result = $bdd->query("SHOW TABLES LIKE 'Student'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Student");
$result = $bdd->query("SHOW TABLES LIKE 'Assessment'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Assessment");
$result = $bdd->query("SHOW TABLES LIKE 'Subject'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Subject");
$result = $bdd->query("SHOW TABLES LIKE 'Lecturer'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Lecturer");
$result = $bdd->query("SHOW TABLES LIKE 'Venue'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Venue");
$result = $bdd->query("SHOW TABLES LIKE 'Lab_room'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Lab_room");
$result = $bdd->query("SHOW TABLES LIKE 'Theory_room'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Theory_room");
$result = $bdd->query("SHOW TABLES LIKE 'Date'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Date");
$result = $bdd->query("SHOW TABLES LIKE 'Participate'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Participate");
$result = $bdd->query("SHOW TABLES LIKE 'Lecturing'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE Lecturing");
$result = $bdd->query("SHOW TABLES LIKE 'enrolled_for'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE enrolled_for");
$result = $bdd->query("SHOW TABLES LIKE 'written_in'")->rowCount() > 0;
if($result)
    $bdd->query("DROP TABLE written_in");*/

$bdd->query("DROP TABLE `assessment`, `Date`, `enrolled_for`, `Lab_room`, `Lecturer`, `lecturing`, `Student`, `Subject`, `Theory_room`, `Venue`, `written_in`");


$insert = $bdd->query("

CREATE TABLE Student(
        ID_student Int NOT NULL ,
        FName      Varchar (25) ,
        LName      Varchar (25) ,
        Email      Varchar (25) ,
        CellNum    Varchar (25) ,
        userImage  Varchar (25) ,
        Password   Varchar (50) ,
        PRIMARY KEY (ID_student )
)ENGINE=InnoDB;

CREATE TABLE Subject(
        SubCode Varchar (7) NOT NULL ,
        SubName Varchar (50) NOT NULL ,
        PRIMARY KEY (SubCode )
)ENGINE=InnoDB;


CREATE TABLE Lecturer(
        ID_lecturer Int NOT NULL ,
        Fname       Varchar (25) ,
        LName       Varchar (25) ,
        Email       Varchar (25) ,
        Password    Varchar (50) ,
        PRIMARY KEY (ID_lecturer )
)ENGINE=InnoDB;


CREATE TABLE Venue(
        ID_venue Varchar (25) NOT NULL ,
        size     Int ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


CREATE TABLE Lab_room(
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


CREATE TABLE Theory_room(
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


CREATE TABLE Date(
        ID_date int (11) Auto_increment  NOT NULL ,
        Day     Int NOT NULL ,
        Month   Varchar (25) NOT NULL ,
        Year    Int NOT NULL ,
        PRIMARY KEY (ID_date )
)ENGINE=InnoDB;


CREATE TABLE lecturing(
        ID_lecturer Int NOT NULL ,
        SubCode     Varchar (7) NOT NULL ,
        PRIMARY KEY (ID_lecturer ,SubCode )
)ENGINE=InnoDB;


CREATE TABLE enrolled_for(
        ID_student Int NOT NULL ,
        SubCode    Varchar (7) NOT NULL ,
        PRIMARY KEY (ID_student ,SubCode )
)ENGINE=InnoDB;


CREATE TABLE written_in(
        SubCode  Varchar (7) NOT NULL ,
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (SubCode ,ID_venue )
)ENGINE=InnoDB;


CREATE TABLE assessment(
        mark       Float ,
        ID_student Int NOT NULL ,
        SubCode    Varchar (7) NOT NULL ,
        ID_date    Int NOT NULL ,
        ID_venue   Varchar (25) NOT NULL ,
        PRIMARY KEY (ID_student ,SubCode ,ID_date ,ID_venue )
)ENGINE=InnoDB;

ALTER TABLE Lab_room ADD CONSTRAINT FK_Lab_room_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE Theory_room ADD CONSTRAINT FK_Theory_room_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE lecturing ADD CONSTRAINT FK_lecturing_ID_lecturer FOREIGN KEY (ID_lecturer) REFERENCES Lecturer(ID_lecturer);
ALTER TABLE lecturing ADD CONSTRAINT FK_lecturing_SubCode FOREIGN KEY (SubCode) REFERENCES Subject(SubCode);
ALTER TABLE enrolled_for ADD CONSTRAINT FK_enrolled_for_ID_student FOREIGN KEY (ID_student) REFERENCES Student(ID_student);
ALTER TABLE enrolled_for ADD CONSTRAINT FK_enrolled_for_SubCode FOREIGN KEY (SubCode) REFERENCES Subject(SubCode);
ALTER TABLE written_in ADD CONSTRAINT FK_written_in_SubCode FOREIGN KEY (SubCode) REFERENCES Subject(SubCode);
ALTER TABLE written_in ADD CONSTRAINT FK_written_in_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE assessment ADD CONSTRAINT FK_assessment_ID_student FOREIGN KEY (ID_student) REFERENCES Student(ID_student);
ALTER TABLE assessment ADD CONSTRAINT FK_assessment_SubCode FOREIGN KEY (SubCode) REFERENCES Subject(SubCode);
ALTER TABLE assessment ADD CONSTRAINT FK_assessment_ID_date FOREIGN KEY (ID_date) REFERENCES Date(ID_date);
ALTER TABLE assessment ADD CONSTRAINT FK_assessment_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);");


$studentData = file ("../files/studentData.txt",FILE_IGNORE_NEW_LINES);

foreach ($studentData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insert = $bdd->prepare('INSERT INTO Student(ID_student,FName,LName,Email,Password,CellNum,userImage) 
                              VALUES (?,?,?,?,?,?,?);');
    $insert->execute(array($value[0],$value[1],$value[2],$value[3],$value[4],$value[5],$value[6]));
}
echo "\n";

$lecturerData = file("../files/lecturerData.txt",FILE_IGNORE_NEW_LINES);

foreach ($lecturerData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insert = $bdd->prepare('INSERT INTO Lecturer(ID_lecturer,FName,LName,Email,Password) 
                              VALUES (?,?,?,?,?);');
    $insert->execute(array($value[0],$value[1],$value[2],$value[3],$value[4]));
}
echo "\n";

$subjectData = file("../files/subjectData.txt",FILE_IGNORE_NEW_LINES);

foreach ($subjectData as $key => $value){
    $value = addslashes($value);
    $value = explode(',',$value);
    print_r($value);

    $insertSubject = $bdd->prepare('INSERT INTO Subject(SubCode,SubName) 
                              VALUES (?,?);');

    $insertSubject->execute(array($value[0],$value[1]));
}
echo "\n";

$venueData = file("../files/venueData.txt",FILE_IGNORE_NEW_LINES);

foreach ($venueData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insertVenue = $bdd->prepare('INSERT INTO venue(ID_venue,size) 
                              VALUES (?,?);');

    $insertVenue->execute(array($value[0],$value[1]));

    if(preg_match("#^1#",$value[0])){
        $insertLab = $bdd->prepare('INSERT INTO Lab_room(ID_venue) 
                              VALUES (?);');
        $insertLab->execute(array($value[0]));
    }
    else{
        $insertThe = $bdd->prepare('INSERT INTO Theory_room(ID_venue) 
                              VALUES (?);');
        $insertThe->execute(array($value[0]));
    }
}

$lecturingData = file("../files/lecturingData.txt",FILE_IGNORE_NEW_LINES);

foreach ($lecturingData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insertLecturing = $bdd->prepare('INSERT INTO lecturing(ID_Lecturer,SubCode) 
                              VALUES (?,?);');

    $insertLecturing->execute(array($value[0],$value[1]));
}
echo "\n";

$writtenInData = file("../files/writteninData.txt",FILE_IGNORE_NEW_LINES);

foreach ($writtenInData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insert = $bdd->prepare('INSERT INTO written_in(SubCode,ID_venue) 
                              VALUES (?,?);');

    $insert->execute(array($value[0],$value[1]));
}
echo "\n";

$enrolledforData = file("../files/enrolledforData.txt",FILE_IGNORE_NEW_LINES);

foreach ($enrolledforData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);
    print_r($value);

    $insert = $bdd->prepare('INSERT INTO enrolled_for(ID_student,SubCode) 
                              VALUES (?,?);');

    $insert->execute(array($value[0],$value[1]));
}
echo "\n";