IF EXISTS(select * from sys.databases where name='IGAPET');
DROP DATABASE IGAPET;

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
	ConnectDate datetime
);

CREATE TABLE houses(
	HouseID int PRIMARY KEY AUTO_INCREMENT,
	UserID int NOT NULL,
	Name varchar(50) NOT NULL,
	Address varchar(255) NOT NULL,
	PostalCode varchar(10) NOT NULL,
	Country varchar(30) NOT NULL,
	NumberOfFloor tinyint NOT NULL
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
	Value varchar(255)

);

CREATE TABLE actuators(
	ActuatorID int PRIMARY KEY AUTO_INCREMENT,
	RoomID int NOT NULL,
	ActuatorTypeID int NOT NULL,
	State varchar(255)
);

CREATE TABLE scenarios(
	ScenarioID int PRIMARY KEY AUTO_INCREMENT,
	ActuatorID int NOT NULL,
	CibleState varchar(255),
	ActionDate datetime
);

CREATE TABLE notifications(
	NotificationID int PRIMARY KEY AUTO_INCREMENT,
	CaptorID int,
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
	Date datetime
);