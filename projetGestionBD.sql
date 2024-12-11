DROP DATABASE dbServer;
CREATE DATABASE IF NOT EXISTS dbServer DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci; USE dbServer;
CREATE TABLE IF NOT EXISTS Serveur (
	server_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	brand_id INT UNSIGNED NOT NULL,
	model VARCHAR(50) NOT NULL,
	formFactor_id INT UNSIGNED NOT NULL,
	OS_id INT UNSIGNED NOT NULL,
	CPU_id INT UNSIGNED NOT NULL,
	CPUCount INT NOT NULL,
	RAM_id INT UNSIGNED NOT NULL,
	RAMCount INT NOT NULL,
	storage_id INT UNSIGNED NOT NULL,
	storageCount INT NOT NULL,
	description VARCHAR(255) NULL,
	price INT NOT NULL,
	imgName VARCHAR(50) NULL,
	hasGPU BIT NOT NULL
);
CREATE TABLE IF NOT EXISTS ServerBrand (
	ServerBrand_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL,
	lineUp VARCHAR(50) NOT NULL, CONSTRAINT PK_ServerBrand PRIMARY KEY (ServerBrand_id)
);
CREATE TABLE IF NOT EXISTS FormFactor (
	FormFactor_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL, CONSTRAINT PK_FormFactor PRIMARY KEY (FormFactor_id)
);
CREATE TABLE IF NOT EXISTS OS (
	OS_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL, CONSTRAINT PK_OS PRIMARY KEY (OS_id)
);
CREATE TABLE IF NOT EXISTS CPU (
	CPU_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	brand_id INT UNSIGNED NOT NULL,
	model VARCHAR(50) NOT NULL,
	baseClockSpeed INT NOT NULL, CONSTRAINT PK_CPU PRIMARY KEY (CPU_id)
);
CREATE TABLE IF NOT EXISTS ProcessorBrand (
	ProcessorBrand_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL, CONSTRAINT PK_ProcessorBrand PRIMARY KEY (ProcessorBrand_id)
);
CREATE TABLE IF NOT EXISTS RAM (
	RAM_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	capacity INT NOT NULL,
	frequency INT NOT NULL, CONSTRAINT PK_RAM PRIMARY KEY (RAM_id)
);
CREATE TABLE IF NOT EXISTS STORAGE (
	Storage_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	capacity INT NOT NULL,
	interface_id INT UNSIGNED,
	type_id INT UNSIGNED NOT NULL, CONSTRAINT PK_Sorage PRIMARY KEY (Storage_id)
);
CREATE TABLE IF NOT EXISTS StorageInterface (
	StorageInterface_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL, CONSTRAINT PK_StorageInterface PRIMARY KEY (StorageInterface_id)
);
CREATE TABLE IF NOT EXISTS StorageType (
	StorageType_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(50) NOT NULL, CONSTRAINT PK_StorageType PRIMARY KEY (StorageType_id)
);
CREATE TABLE if NOT EXISTS utilisateur(
    user_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    mdp VARCHAR(50) NOT NULL,
    adresse_id INT UNSIGNED NOT null,
    nom varchar(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    CONSTRAINT PK_user PRIMARY KEY(user_id)

);
CREATE TABLE  if NOT EXISTS adresse(
	adresse_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
   numero_rue INT NOT NULL,
   nom_rue VARCHAR(50) NOT NULL,
   ville VARCHAR(50) NOT NULL,
   province_id INT UNSIGNED NOT null,
   code_postal VARCHAR(6) NOT NULL,
   CONSTRAINT PK_adresse PRIMARY KEY(adresse_id)
);

CREATE TABLE if NOT EXISTS province(
    province_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    prevince_name VARCHAR(50),
    CONSTRAINT PK_province PRIMARY KEY(province_id)
);

ALTER TABLE adresse ADD CONSTRAINT FK_province FOREIGN KEY (province_id) REFERENCES province (province_id); 
ALTER TABLE utilisateur ADD CONSTRAINT FK_adresse FOREIGN KEY (adresse_id) REFERENCES adresse (adresse_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_ServerBrand FOREIGN KEY (brand_id) REFERENCES ServerBrand (ServerBrand_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_formFactor FOREIGN KEY (formFactor_id) REFERENCES formFactor (formFactor_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_OS FOREIGN KEY (OS_id) REFERENCES OS (OS_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_CPU FOREIGN KEY (CPU_id) REFERENCES CPU (CPU_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_RAM FOREIGN KEY (RAM_id) REFERENCES RAM (RAM_id); 
ALTER TABLE Serveur ADD CONSTRAINT FK_Storage FOREIGN KEY (storage_id) REFERENCES STORAGE (storage_id); 
ALTER TABLE CPU ADD CONSTRAINT FK_ProcessorBrand FOREIGN KEY (brand_id) REFERENCES ProcessorBrand (ProcessorBrand_id); 
ALTER TABLE STORAGE ADD CONSTRAINT FK_StorageInterface FOREIGN KEY (interface_id) REFERENCES StorageInterface (StorageInterface_id); 
ALTER TABLE STORAGE ADD CONSTRAINT FK_StorageType FOREIGN KEY (type_id) REFERENCES StorageType (StorageType_id);
INSERT INTO province (province_id, prevince_name) VALUES
(1, 'quebec'),
(2, 'ontario'),
(3, 'alberta'),
(4, 'nunavut'),
(5, 'yukon');

INSERT INTO FormFactor (name)
VALUES ('Rack'),
	('Blade'),
	('Tower');

INSERT INTO ServerBrand (name, lineUp)
VALUES ('Dell','PowerEdge');

INSERT INTO OS (name)
VALUES ('Windows Server 2022');

INSERT INTO ProcessorBrand (name)
VALUES ('Intel'),
	('AMD');

INSERT INTO RAM (capacity, frequency)
VALUES (8, 3200),
	(16, 4800),
	(16, 3200);

INSERT INTO StorageInterface (name)
VALUES ('SATA'),
	('SAS');

INSERT INTO StorageType (name)
VALUES ('SSD'),
	('HDD');

INSERT INTO Storage (capacity, interface_id, type_id)
VALUES (2000, 1, 2),
	(1000, 1, 2),
	(2000, null, 2),
	(600, null, 2),
	(1000, 1, 2),
	(2000, null, 2),
	(1000, 2, 2),
	(2000, null, 2);

INSERT INTO CPU (brand_id, model, baseClockSpeed)
VALUES (1, 'Pentium G7400', 3.7),
	(1, 'Pentium G6505', 4.2),
	(1, 'Xeon Gold 6416', 2.2),
	(2, 'EPYC 7443P', 2.85),
	(1, 'AMD EPYC 7313', 3.0),
	(2, 'AMD EPYC 9224', 2.5);

INSERT INTO Serveur (brand_id, model, formFactor_id, OS_id, CPU_id, CPUCount, RAM_id, RAMCount, storage_id, storageCount, description, price, imgName, hasGPU)
Values 
	(1, 'R360', 1, 1, 1, 1, 2, 1, 1, 1, 'Entry-level rack server that provides greater flexibility for customers needing versatile, affordable, and virtualization-ready processing power.', 2509, 'R360.jpg', 1),
	(1, 'R250', 1, 1, 2, 1, 1, 1, 1, 1, 'Deliver powerful compute with an entry-level rackmount server. Designed to address common business applications.', 1349, 'R250.jpg', 0),
	(1, 'R260', 1, 1, 1,1,2,1,3,1,'Designed to address entry-level compute demands of Near-Edge, Remote / Branch Office and SMB. Entreprise features and capabilities with optimal price and options', 1869,'R260.jpg',0),
	(1, 'T150', 3, 1, 2,1,1,1,5,1, 'Delevir compute with this entry-level tower server. Reliable for fondational workloads and designed for common business needs.',1029,'T150.jpg',0),
	(1, 'R7625', 1, 1,6,1,2,1,1,1, 'Highly scalable rack server with 50% more cores and up to 6 GPUs, combining powerful performance andflexible configuration ideal for data analytics, all flash SDS and VDI', 8099, 'R7625.jpg',0);
