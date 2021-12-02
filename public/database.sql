/**
 * Création et selection de la base de donnée
 */
 CREATE DATABASE template;
 USE template;

/**
 * Création de la table utilisateur
 */
CREATE TABLE users (
    userId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    pseudonyme VARCHAR(255) NOT NULL,
    passwd VARCHAR(255) NOT NULL,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    phoneNumber VARCHAR(255),
    isForgot BOOLEAN DEFAULT 0,
    forgotPasswordToken VARCHAR(50),
    isAdmin BOOLEAN DEFAULT 0,
    creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE boats(
    boatId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    imatriculation INT NOT NULL,
    bname VARCHAR(255) ,
    model VARCHAR(255) ,
    motor VARCHAR(255) ,
    launchDate DATETIME ,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
);

CREATE TABLE persons(
    personId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(255) ,
    grade VARCHAR(255),
    content TEXT,
    pics VARCHAR(255),
    birth DATETIME ,
    death DATETIME ,
    gender BOOLEAN,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
);

CREATE TABLE decorations(
    decoId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(255),
    pics VARCHAR(255),
);


CREATE TABLE savings(
    savingId INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    savingName VARCHAR(255) ,
    nbSave INT,
    content TEXT,
    destination VARCHAR(255),
    savingDate DATETIME,
    confirmed BOOLEAN DEFAULT 0,
    oldRef INT,
);

CREATE TABLE crews(
    post VARCHAR(255),
    nbDead INT,
    FOREIGN KEY (boatId) REFERENCES boats(boatId),
    FOREIGN KEY (savingId) REFERENCES savings(savingId),
    FOREIGN KEY (personId) REFERENCES persons(personId),
);



CREATE TABLE siblings(
    FOREIGN KEY (personId) REFERENCES persons(personId),
    FOREIGN KEY (siblingId) REFERENCES persons(personId),
);

CREATE TABLE parents(
    FOREIGN KEY (personId) REFERENCES persons(personId),
    FOREIGN KEY (parentId) REFERENCES persons(personId),
);

CREATE TABLE decorated(
    FOREIGN KEY (decoId) REFERENCES decorations(decoId),
    FOREIGN KEY (personId) REFERENCES persons(personId),
);
