CREATE DATABASE IGAPET;

USE IGAPET;

CREATE TABLE users(
	UserID int PRIMARY KEY AUTO_INCREMENT,
	FirstName varchar(70),
	LastName varchar(70),
	Mail varchar(70) NOT NULL,
	CreationDate date NOT NULL,
	UserPassword varchar(255) NOT NULL,
	UserTypeID tinyint NOT NULL,
	Phone varchar(15),
	NbrConnexion int(11) NOT NULL,
	ConnectDate date,
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

INSERT INTO Users(FirstName, LastName, Mail, CreationDate, UserPassword, UserTypeID, Phone, NbrConnexion) VALUES ('Edgar', 'Admin', 'app.igapet@gmail.com', '2018-05-17', '$2y$10$QFHqu/zv92wr.ndlBslq2.qJnRQE.CZXwXaC8Du8BUMf5M7qLzlA2', -2, NULL, 1);
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Luminosité', '%', 'img/luminosity.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Température', '°C', 'img/thermometer.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Humidité', '%', 'img/humidity.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Son', 'dB', 'img/speaker.png');
INSERT INTO CaptorTypes(CaptorName, Unit, url_img) VALUES ('Présence', NULL , 'img/signal.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Volets', '%', 0, 100, 'img/blinds.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Lumière', NULL, 'OFF', 'ON', 'img/light_icon.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Radiateur', '°C', 20, 40, 'img/radiator.png');
INSERT INTO ActuatorTypes(ActuatorName, Unit, MinimumValue, MaximumValue, url_img) VALUES ('Ventilateur', NULL , 'OFF', 'ON', 'img/ventilator.png');
INSERT INTO page (PageName, PageContent) VALUES ('CGU', NULL);
INSERT INTO page (PageName, PageContent) VALUES ('A propos', "Les 4  éléments forts d\'iGAPET : \r\n\r\nLa communication : \r\nPar l\'intermédiaire de notre site internet (partie client), iGAPET va vous permettre de faire intéragir l\'ensemble des objets connectés de votre maison. Les objets connectés sont reliés à des capteurs, qui eux-mêmes sont reliés à un serveur, qui centralise toutes les commandes. Les technologies que nous utilisons sont le Bluetooth et le Wi-Fi.\r\n\r\nLe cloud : \r\nLe cloud computing (en français : l\'informatique en nuage) représente l\'exploitation de la puissance des serveurs, par le biais d\'un réseau, généralement Internet. Ce réseau est partagé, ce qui permettra à plusieurs personnes d\'avoir accès aux services des objets connectés, à volonté et dans n\'importe quelle pièce de la maison.\r\n\r\nLe confort :\r\nLe confort de l\'utilisateur est un point important pour iGAPET. Nous donnons la possibilité aux utilisateurs de réaliser une grande partie des tâches de la vie quotidienne en un seul clic. Par exemple, pouvoir fermer les volets de votre maison, allumer toutes les lampes d\'une pièce ou encore augmenter le chauffage d\'une pièce, ainsi que de nombreuses autres fonctions.\r\n\r\nLa sécurité :\r\nVous rêviez d\'une maison sécurisée 24h/24 ? Vous êtes au bon endroit. En effet, iGAPET propose de nombreuses solutions afin de rendre votre maison hors de danger : caméra connectée, capteurs au niveau des portes et des fenêtres. Ce qui vous avertira lors d\'une intrusion.");
INSERT INTO page (PageName, PageContent) VALUES ('FAQ', 'Comment modifier ses informations personnelles ?\r\nIl suffit de cliquer sur la case, en haut à droite, contenant votre mail / nom. Vous allez arriver sur une nouvelle page où vous pourrais modifier vos informations personnelles (Prénom, Nom, Numéro de Téléphone).\r\n\r\n');
INSERT INTO page (PageName, PageContent) VALUES ('Mentions Légales', "Informations auteurs du site :\r\nAuteur du site : iGAPET\r\nAdresse mail : app.igapet@gmail.com\r\nAdresse : 10 rue de Vanves, 92130 Issy-les-Moulineaux\r\n\r\nDonnées personnelles : \r\nVos données personnelles ne sont pas divulgués.\r\n\r\n\r\n\r\n\r\n");
