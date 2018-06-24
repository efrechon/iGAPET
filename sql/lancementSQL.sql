CREATE DATABASE IGAPET;

USE IGAPET;

CREATE TABLE users(
	UserID int PRIMARY KEY AUTO_INCREMENT,
	FirstName varchar(70),
	LastName varchar(70),
	Mail varchar(70) NOT NULL,
	CreationDate datetime NOT NULL,
	UserPassword varchar(255) NOT NULL,
	UserTypeID tinyint NOT NULL,
	Phone varchar(15),
	NbrConnexion int(11) NOT NULL,
	ConnectDate datetime,
	FavoriteHome int(11)
);

CREATE TABLE houses(
	HouseID int PRIMARY KEY AUTO_INCREMENT,
	UserID int NOT NULL,
	Name varchar(50) NOT NULL,
	Address varchar(255) NOT NULL,
	PostalCode varchar(10) NOT NULL,
	Country varchar(30) NOT NULL,
	NumberOfFloor tinyint NOT NULL,
	Link varchar(4)
);

CREATE TABLE rooms(
	RoomID int PRIMARY KEY AUTO_INCREMENT,
	HouseID int NOT NULL,
	Name varchar(30) NOT NULL,
	xPosition real,
	yPosition real,
	Width real NOT NULL,
	Height real NOT NULL,
	Floor tinyint
);

CREATE TABLE captors(
	CaptorID int PRIMARY KEY AUTO_INCREMENT,
	RoomID int NOT NULL,
	CaptorTypeID int NOT NULL,
	Value varchar(255),
	captorlink varchar(2),
	link varchar(4)

);

CREATE TABLE actuators(
	ActuatorID int PRIMARY KEY AUTO_INCREMENT,
	RoomID int NOT NULL,
	ActuatorTypeID int NOT NULL,
	State varchar(255),
	captlorlink varchar(2),
	link varchar(4)
);

CREATE TABLE scenarios(
	ScenarioID int PRIMARY KEY AUTO_INCREMENT,
	ActuatorID int NOT NULL,
	CibleState varchar(255),
	ActionDateBegin datetime,
	ActionDateEnd datetime,
	ActionLength time
);

CREATE TABLE notifications(
	NotificationID int PRIMARY KEY AUTO_INCREMENT,
	link varchar(4),
	captorlink varchar(2),
	Threshold varchar(255),
	ThresholdType varchar(1)
);

CREATE TABLE usertypes(
	UserTypeID int PRIMARY KEY AUTO_INCREMENT,
	ParentUserID int NOT NULL,
	ManageUsers varchar(1) NOT NULL,
	AddScenarios varchar(1) NOT NULL,
	AddNotifications varchar(1) NOT NULL,
	ConsultNotifications varchar(1) NOT NULL,
	ManageHouses varchar(1) NOT NULL,
	CustomAutorisationsHouse varchar(255) NOT NULL,
	CustomAutorisationsCaptor varchar(255) NOT NULL
);

CREATE TABLE captortypes(
	CaptorTypeID int PRIMARY KEY AUTO_INCREMENT,
	CaptorName varchar(30) NOT NULL,
	Unit varchar(10),
	url_img varchar(255)
);

CREATE TABLE actuatortypes(
	ActuatorTypeID int PRIMARY KEY AUTO_INCREMENT,
	ActuatorName varchar(30) NOT NULL,
	Unit varchar(10),
	MinimumValue varchar(255),
	MaximumValue varchar(255),
	url_img varchar(255)
);

CREATE TABLE page(
	PageID int PRIMARY KEY AUTO_INCREMENT,
	PageName varchar(100),
	PageContent TEXT
);

CREATE TABLE messagerie(
	MessagerieID int PRIMARY KEY AUTO_INCREMENT,
	UserID int,
	Correspondant varchar(255),
	Objet varchar(255),
	Demande text,
	Date datetime
);

CREATE TABLE trames(
	TrameID int PRIMARY KEY AUTO_INCREMENT,
	CaptorType varchar(1),
	CaptorNumber varchar(2),
	Value varchar(16),
	TrameNumber varchar(4),
	Date datetime,
	Link varchar(4)
	
);

INSERT INTO Users(FirstName, LastName, Mail, CreationDate, UserPassword, UserTypeID, Phone, NbrConnexion) VALUES ('Nicolas', 'Terru', 'nicolas.terru@gmail.com', '2018-05-10', '$2y$10$Q9e2escHubQahsHFeT01re7h9.0gGjqu3GHf5Ej2zXQzy9CkhoK.2', 0, '+33678940312', 20);
INSERT INTO Users(FirstName, LastName, Mail, CreationDate, UserPassword, UserTypeID, Phone, NbrConnexion) VALUES ('Dany', 'Brillant', 'dany@free.fr', '2018-05-17', '$2y$10$weHYROCoUDmn9ebsFzf.Y.uvfBtCAB3SHQKVA4FHTr5XmP2Z041..', 0, '+3367890452314', 11);
INSERT INTO Users(FirstName, LastName, Mail, CreationDate, UserPassword, UserTypeID, Phone, NbrConnexion) VALUES ('Edgar', 'Admin', 'app.igapet@gmail.com', '2018-05-17', '$2y$10$QFHqu/zv92wr.ndlBslq2.qJnRQE.CZXwXaC8Du8BUMf5M7qLzlA2', -2, NULL, 310);
INSERT INTO Houses(UserID, Name, Address, PostalCode, Country, NumberOfFloor) VALUES (1, 'Maison Principale', '5 avenue de la République', 92450, 'France', 2);
INSERT INTO Houses(UserID, Name, Address, PostalCode, Country, NumberOfFloor) VALUES (1, 'AirBnB', '4 rue des Mimosas', 33095, 'France', 1);
INSERT INTO Houses(UserID, Name, Address, PostalCode, Country, NumberOfFloor) VALUES (2, 'Principale', '34 bis rue Bataille', 78500, 'France', 3);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (1, 'Cuisine', 75, 140, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (1, 'Salle à manger', 150, 210, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (1, 'Chambre Benjamin', 45, 90, 2);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (1, 'Bureau', 75, 80, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (2, 'Studio', 360, 240, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (3, 'Cuisine', 80, 120, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (3, 'Salon', 120, 165, 1);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (3, 'Chambre parent', 150, 165, 2);
INSERT INTO Rooms(HouseID, Name, Width, Height, Floor) VALUES (3, 'Salle de sport', 50, 80, 3);
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Luminosité', '%', 'img/luminosity.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Température', '°C', 'img/thermometer.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Humidité', '%', 'img/humidity.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Son', 'dB', 'img/speaker.png');
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (1, 1, 90);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (2, 2, 19);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (3, 3, 10);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (4, 5, 67);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (5, 1, 63);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (5, 2, 20);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (5, 3, 70);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (6, 2, 23);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (7, 1, 75);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (8, 1, 50);
INSERT INTO Captors(RoomID, CaptorTypeID, Value) VALUES (9, 1, 100);
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Volets', '%', 0, 100, 'img/blinds.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Lumière', NULL, 'OFF', 'ON', 'img/light_icon.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Radiateur', '°C', 20, 40, 'img/radiator.png');
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (1, 1, 0);
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (2, 2, 'OFF');
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (3, 1, 0);
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (4, 1, 0);
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (5, 2, 'ON');
INSERT INTO Actuators(RoomID, ActuatorTypeID, State) VALUES (8, 1, 80);
INSERT INTO Page(PageName, PageContent) VALUES ('CGU', NULL);
INSERT INTO Page(PageName, PageContent) VALUES ('Mentions Légales', NULL);
INSERT INTO Page(PageName, PageContent) VALUES ('A propos', NULL);
INSERT INTO Page(PageName, PageContent) VALUES ('FAQ', NULL);
