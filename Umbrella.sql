USE S19_350_Team_Pink;

Create TABLE BOWs (
        BOWID INTEGER NOT NULL AUTO_INCREMENT,
        virusID INTEGER,
        name VARCHAR(50),
        description VARCHAR(50),
        PRIMARY KEY(BOWID)
        );

Create Table Virus (
        virusID INTEGER NOT NULL AUTO_INCREMENT,
        creatorID INTEGER,
        virusName VARCHAR(50),
        PRIMARY KEY(virusID)
        );

CREATE TABLE WorkSites (
        locationID INTEGER NOT NULL AUTO_INCREMENT,
        siteName VARCHAR(50),
        city VARCHAR(50),
        state VARCHAR(50),
        country VARCHAR(50),
        PRIMARY KEY(locationID)
        );

CREATE TABLE Employees (
        employeeID INTEGER NOT NULL AUTO_INCREMENT,
        managerID INTEGER,
        name VARCHAR(50),
        username VARCHAR(50),
        password VARCHAR(50),
        email VARCHAR(50),
        role VARCHAR(50),
        PRIMARY KEY(employeeID)
        );

CREATE TABLE Collaborators (
        collaboratorID INTEGER NOT NULL AUTO_INCREMENT,
        companyName VARCHAR(50),
        PRIMARY KEY(collaboratorID)
        );

CREATE TABLE Projects (
        projectID INTEGER NOT NULL AUTO_INCREMENT,
        directorID INTEGER,
        accessID INTEGER,
        projectname VARCHAR(50),
        PRIMARY KEY(projectID)
        );

CREATE TABLE AccessDescription (
        accessID INTEGER NOT NULL AUTO_INCREMENT,
        clearanceDescription VARCHAR(50),
        PRIMARY KEY(accessID)
        );

CREATE TABLE ProjectStaff (
        projectID INTEGER,
        employeeID INTEGER
        );

Create TABLE AccessLevel (
        employeeID INTEGER,
        accessID INTEGER
        );

CREATE TABLE Endorsements (
        collaboratorID INTEGER,
        virusID INTEGER
        );

CREATE TABLE AuthorizedLocations (
        locationID INTEGER,
        employeeID INTEGER
        );
        
ALTER TABLE ProjectStaff ADD FOREIGN KEY(projectID) REFERENCES Projects(projectID);
ALTER TABLE ProjectStaff ADD FOREIGN KEY(employeeID) REFERENCES Employees(employeeID);

ALTER TABLE AccessLevel ADD FOREIGN KEY(employeeID) REFERENCES Employees(employeeID);
ALTER TABLE AccessLevel ADD FOREIGN KEY(accessID) REFERENCES AccessDescription(accessID);

ALTER TABLE Endorsements ADD FOREIGN KEY(collaboratorID) REFERENCES Collaborators(collaboratorID);
ALTER TABLE Endorsements ADD FOREIGN KEY(virusID) REFERENCES Virus(virusID);

ALTER TABLE AuthorizedLocations ADD FOREIGN KEY(locationID) REFERENCES WorkSites(locationID);
ALTER TABLE AuthorizedLocations ADD FOREIGN KEY(employeeID) REFERENCES Employees(employeeID);

ALTER TABLE Projects ADD FOREIGN KEY(directorID) REFERENCES Employees(employeeID);
ALTER TABLE Projects ADD FOREIGN KEY(accessID) REFERENCES AccessDescription(accessID);
ALTER TABLE Employees ADD FOREIGN KEY(managerID) REFERENCES Employees(employeeID);
ALTER TABLE Virus ADD FOREIGN KEY(creatorID) REFERENCES Employees(employeeID);
ALTER TABLE BOWs ADD FOREIGN KEY(virusID) REFERENCES Virus(virusID);

INSERT INTO WorkSites (siteName, city, state, country) Values ("Spencer Mansion", "Raccoon City", "IO", "United States");
INSERT INTO WorkSites (siteName, city, state, country) Values ("The Nest", "Raccoon City", "IO", "United States");
INSERT INTO WorkSites (siteName, city, country) Values ("Paris Lab", "Paris", "France");
INSERT INTO WorkSites (siteName, city, country) Values ("Caucasus Lab", "Matsed", "Russia");
INSERT INTO WorkSites (siteName, city, state, country) Values ("LightHouse", "Calbian Cove", "MA", "United States");
INSERT INTO WorkSites (siteName, country) Values ("Rockfort Island",  "South Pacific");

Insert Into AccessDescription (clearanceDescription) Values ("General");
Insert Into AccessDescription (clearanceDescription) Values ("Secret");
Insert Into AccessDescription (clearanceDescription) Values ("Top Secret");
Insert Into AccessDescription (clearanceDescription) Values ("Admin");
Insert Into AccessDescription (clearanceDescription) Values ("All-Access");

INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (1, 1, "Ozwell Spencer", "Ospencer", "Godcomplex96", "Ospen@umbrella.org", "President");
INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (2, 1, "Albert Wesker", "Awesker", "Sonofgodcomplex98", "Awesker@umbrella.org", "S.T.A.R.S Lead");
INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (3, 2, "William Birkin", "Wbirkin", "Gismycreation1", "Wbirk@umbrella.org", "Lead Scientist");
INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (5, 2, "H.U.N.K.", "Mreaper", "Extractionpoint98", "Mreap@umberella.org", "Mercenary");
Insert Into Employees (employeeID, managerID,name,username,password,email,role) Values (10, 5,"Nicholai Ginoveaf","Nginoveaf","lapdogh9r","Ngino@umberella.org","Umberella Counter Measures");
INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (4, 10, "Jack Norman", "Jnorman", "Divinecomedy", "Jnorm@umbrella.org", "Security");
Insert Into Employees (employeeID, managerID,name,username,password,email,role) Values (8, 3,"Annette Birkin","Abirkin","Ullnevergetthevirus","Abirkin@umberella.org","Director");
Insert Into Employees (employeeID, managerID,name,username,password,email,role) Values (9, 8,"Alexia Ashford","Aashford","Beautysleep4life","Aashford@umbrella.org","Scientist");
Insert Into Employees (employeeID, managerID,name,username,password,email,role) Values (7, 1,"James Marcus","Jmarcus","Operamusiclover","Jmarcus@umberella.org","Lead Scientist");
INSERT INTO Employees (employeeID, managerID, name, username, password, email, role) Values (6, 7, "George Trevor", "Gtrevor", "Nighttrapenthusist1", "Gtrev@umbrella.org", "Architect");

Insert Into AccessLevel (accessID) Values (5);
Insert Into AccessLevel (accessID) Values (4);
Insert Into AccessLevel (accessID) Values (4);
Insert Into AccessLevel (accessID) Values (1);
Insert Into AccessLevel (accessID) Values (3);
Insert Into AccessLevel (accessID) Values (1);
Insert Into AccessLevel (accessID) Values (5);
Insert Into AccessLevel (accessID) Values (4);
Insert Into AccessLevel (accessID) Values (2);
Insert Into AccessLevel (accessID) Values (2);

Insert Into AuthorizedLocations (locationID,employeeID) Values (1,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (1,2);
Insert Into AuthorizedLocations (locationID,employeeID) Values (1,3);
Insert Into AuthorizedLocations (locationID,employeeID) Values (1,6);
Insert Into AuthorizedLocations (locationID,employeeID) Values (1,7);
Insert Into AuthorizedLocations (locationID,employeeID) Values (2,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (2,3);
Insert Into AuthorizedLocations (locationID,employeeID) Values (2,8);
Insert Into AuthorizedLocations (locationID,employeeID) Values (2,5);
Insert Into AuthorizedLocations (locationID,employeeID) Values (3,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (3,4);
Insert Into AuthorizedLocations (locationID,employeeID) Values (4,10);
Insert Into AuthorizedLocations (locationID,employeeID) Values (4,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (5,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (5,5);
Insert Into AuthorizedLocations (locationID,employeeID) Values (6,1);
Insert Into AuthorizedLocations (locationID,employeeID) Values (6,9);

INSERT INTO Virus (creatorID, virusName) Values (1, "T-virus");
INSERT INTO Virus (creatorID, virusName) Values (3, "G-virus");
INSERT INTO Virus (creatorID, virusName) Values (4, "T-Abyss");
INSERT INTO Virus (creatorID, virusName) Values (2, "Uroboros");

Insert Into BOWs (virusID,name,description) Values (1,"Hunter","Agile Reptilian");
Insert Into BOWs (virusID,name,description) Values (3,"Wall Blister","Mutated Barnacle");
Insert Into BOWs (virusID,name,description) Values (2,"G creation","Sewer Dewller");
Insert Into BOWs (virusID,name,description) Values (4,"Revanent","Amalgamated Horror");
Insert Into BOWs (virusID,name,description) Values (1,"T-103","Bulletproof Giant");

INSERT INTO Projects (directorID, accessID, projectname) Values (7, 3, "Project Tyrant");
INSERT INTO Projects (directorID, accessID, projectname) Values (3, 1, "Project Deity");
INSERT INTO Projects (directorID, accessID, projectname) Values (2, 3, "Project Snake");
INSERT INTO Projects (directorID, accessID, projectname) Values (9, 2, "Project Veronica");

INSERT INTO ProjectStaff (projectID, employeeID) Values (1, 1);
INSERT INTO ProjectStaff (projectID, employeeID) Values (1, 7);
INSERT INTO ProjectStaff (projectID, employeeID) Values (2, 3);
INSERT INTO ProjectStaff (projectID, employeeID) Values (2, 8);
INSERT INTO ProjectStaff (projectID, employeeID) Values (3, 2);
INSERT INTO ProjectStaff (projectID, employeeID) Values (3, 4);
INSERT INTO ProjectStaff (projectID, employeeID) Values (4, 9);
INSERT INTO ProjectStaff (projectID, employeeID) Values (4, 7);

INSERT INTO Collaborators (companyName) Values ("Tricell");
INSERT INTO Collaborators (companyName) Values ("Raccoon City Police Department");
INSERT INTO Collaborators (companyName) Values ("Alliance of Eastern Slav");
INSERT INTO Collaborators (companyName) Values ("Ilvelto");
INSERT INTO Collaborators (companyName) Values ("The Connections");

Insert Into Endorsements (collaboratorID, virusID) Values (1, 4);
Insert Into Endorsements (collaboratorID, virusID) Values (2, 2);
Insert Into Endorsements (collaboratorID, virusID) Values (2, 1);
Insert Into Endorsements (collaboratorID, virusID) Values (4, 3);
Insert Into Endorsements (collaboratorID, virusID) Values (3, 3);
Insert Into Endorsements (collaboratorID, virusID) Values (5, 1);
