#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Student
#------------------------------------------------------------

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


#------------------------------------------------------------
# Table: Subject
#------------------------------------------------------------

CREATE TABLE Subject(
        SubCode Varchar (7) NOT NULL ,
        SubName Varchar (50) NOT NULL ,
        PRIMARY KEY (SubCode )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lecturer
#------------------------------------------------------------

CREATE TABLE Lecturer(
        ID_lecturer Int NOT NULL ,
        Fname       Varchar (25) ,
        LName       Varchar (25) ,
        Email       Varchar (25) ,
        Password    Varchar (50) ,
        PRIMARY KEY (ID_lecturer )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Venue
#------------------------------------------------------------

CREATE TABLE Venue(
        ID_venue Varchar (25) NOT NULL ,
        size     Int ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Lab_room
#------------------------------------------------------------

CREATE TABLE Lab_room(
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Theory_room
#------------------------------------------------------------

CREATE TABLE Theory_room(
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (ID_venue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Date
#------------------------------------------------------------

CREATE TABLE Date(
        ID_date int (11) Auto_increment  NOT NULL ,
        Day     Int NOT NULL ,
        Month   Varchar (25) NOT NULL ,
        Year    Int NOT NULL ,
        PRIMARY KEY (ID_date )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: lecturing
#------------------------------------------------------------

CREATE TABLE lecturing(
        ID_lecturer Int NOT NULL ,
        SubCode     Varchar (7) NOT NULL ,
        PRIMARY KEY (ID_lecturer ,SubCode )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enrolled_for
#------------------------------------------------------------

CREATE TABLE enrolled_for(
        ID_student Int NOT NULL ,
        SubCode    Varchar (7) NOT NULL ,
        PRIMARY KEY (ID_student ,SubCode )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: written_in
#------------------------------------------------------------

CREATE TABLE written_in(
        SubCode  Varchar (7) NOT NULL ,
        ID_venue Varchar (25) NOT NULL ,
        PRIMARY KEY (SubCode ,ID_venue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: assessment
#------------------------------------------------------------

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
ALTER TABLE assessment ADD CONSTRAINT FK_assessment_ID_venue FOREIGN KEY (ID_venue) REFERENCES Venue(ID_venue);
