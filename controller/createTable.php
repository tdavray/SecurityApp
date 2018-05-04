<?php

require_once "DBconn.php";

$bdd = co();

$result = $bdd->query("SHOW TABLES LIKE 'Student'")->rowCount() > 0;
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
    $bdd->query("DROP TABLE written_in");
$insert = $bdd->query("CREATE TABLE Student(
    ID_student int (11) Auto_increment  NOT NULL ,
        FName      Varchar (25) NOT NULL,
        LName      Varchar (25) NOT NULL,
        Email      Varchar (25) NOT NULL,
        PRIMARY KEY (ID_student )
);


#------------------------------------------------------------
# Table: Assessment
#------------------------------------------------------------

CREATE TABLE Assessment(
    ID_assessment int (11) Auto_increment  NOT NULL ,
        ID_subject    Int NOT NULL,
        ID_venue      Int NOT NULL,
        ID_date       Int NOT NULL ,
        PRIMARY KEY (ID_assessment )
);


#------------------------------------------------------------
# Table: Subject
#------------------------------------------------------------

CREATE TABLE Subject(
    ID_subject int (11) Auto_increment  NOT NULL ,
        SubCode    Varchar (7) NOT NULL ,
        SubName    Varchar (50) NOT NULL ,
        PRIMARY KEY (ID_subject )
);


#------------------------------------------------------------
# Table: Lecturer
#------------------------------------------------------------

CREATE TABLE Lecturer(
    ID_lecturer int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (ID_lecturer )
);


#------------------------------------------------------------
# Table: Venue
#------------------------------------------------------------

CREATE TABLE Venue(
    ID_venue int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (ID_venue )
);


#------------------------------------------------------------
# Table: Lab_room
#------------------------------------------------------------

CREATE TABLE Lab_room(
    ID_venue Int NOT NULL ,
        PRIMARY KEY (ID_venue )
);


#------------------------------------------------------------
# Table: Theory_room
#------------------------------------------------------------

CREATE TABLE Theory_room(
    ID_venue Int NOT NULL ,
        PRIMARY KEY (ID_venue )
);


#------------------------------------------------------------
# Table: Date
#------------------------------------------------------------

CREATE TABLE Date(
    ID_date int (11) Auto_increment  NOT NULL ,
        Day     Int NOT NULL ,
        Month   Varchar (25) NOT NULL ,
        Year    Int NOT NULL ,
        PRIMARY KEY (ID_date )
);


#------------------------------------------------------------
# Table: participate
#------------------------------------------------------------

CREATE TABLE participate(
    ID_student    Int NOT NULL ,
        ID_assessment Int NOT NULL ,
        PRIMARY KEY (ID_student ,ID_assessment )
);


#------------------------------------------------------------
# Table: lecturing
#------------------------------------------------------------

CREATE TABLE lecturing(
    ID_lecturer Int NOT NULL ,
        ID_subject  Int NOT NULL ,
        PRIMARY KEY (ID_lecturer ,ID_subject )
);


#------------------------------------------------------------
# Table: enrolled_for
#------------------------------------------------------------

CREATE TABLE enrolled_for(
    ID_student Int NOT NULL ,
        ID_subject Int NOT NULL ,
        PRIMARY KEY (ID_student ,ID_subject )
);


#------------------------------------------------------------
# Table: written_in
#------------------------------------------------------------

CREATE TABLE written_in(
    ID_subject Int NOT NULL ,
        ID_venue   Int NOT NULL ,
        PRIMARY KEY (ID_subject ,ID_venue )
);

ALTER TABLE Assessment ADD CONSTRAINT FK_Assessment_ID_subject FOREIGN KEY (ID_subject) REFERENCES Subject(ID_subject);
ALTER TABLE Assessment ADD CONSTRAINT FK_Assessment_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE Assessment ADD CONSTRAINT FK_Assessment_ID_date FOREIGN KEY (ID_date) REFERENCES Date(ID_date);
ALTER TABLE Lab_room ADD CONSTRAINT FK_Lab_room_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE Theory_room ADD CONSTRAINT FK_Theory_room_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
ALTER TABLE participate ADD CONSTRAINT FK_participate_ID_student FOREIGN KEY (ID_student) REFERENCES Student(ID_student);
ALTER TABLE participate ADD CONSTRAINT FK_participate_ID_assessment FOREIGN KEY (ID_assessment) REFERENCES Assessment(ID_assessment);
ALTER TABLE lecturing ADD CONSTRAINT FK_lecturing_ID_lecturer FOREIGN KEY (ID_lecturer) REFERENCES Lecturer(ID_lecturer);
ALTER TABLE lecturing ADD CONSTRAINT FK_lecturing_ID_subject FOREIGN KEY (ID_subject) REFERENCES Subject(ID_subject);
ALTER TABLE enrolled_for ADD CONSTRAINT FK_enrolled_for_ID_student FOREIGN KEY (ID_student) REFERENCES Student(ID_student);
ALTER TABLE enrolled_for ADD CONSTRAINT FK_enrolled_for_ID_subject FOREIGN KEY (ID_subject) REFERENCES Subject(ID_subject);
ALTER TABLE written_in ADD CONSTRAINT FK_written_in_ID_subject FOREIGN KEY (ID_subject) REFERENCES Subject(ID_subject);
ALTER TABLE written_in ADD CONSTRAINT FK_written_in_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue)");


$userData = file ("../files/userData.txt",FILE_IGNORE_NEW_LINES);

foreach ($userData as $key => $value){
    $value = addslashes($value);
    $value = explode(' ',$value);

    $insert = $bdd->prepare('INSERT INTO Student(FName,LName,Email,Password) 
                              VALUES (?,?,?,?);');
    $insert->execute(array($value[0],$value[1],$value[2],$value[3]));
}

$subjectData = file("../files/subjectData.txt",FILE_IGNORE_NEW_LINES);

foreach ($subjectData as $key => $value){
    $value = addslashes($value);
    $value = explode(',',$value);
    echo "$value[0] ";

    $insertSubject = $bdd->prepare('INSERT INTO Subject(SubCode,SubName) 
                              VALUES (?,?);');

    $insertSubject->execute(array($value[0],$value[1]));
}