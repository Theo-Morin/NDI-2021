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
    creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE boats();

CREATE TABLE boats();

CREATE TABLE persons();

CREATE TABLE decorations();

CREATE TABLE boats();

CREATE TABLE savings();

CREATE TABLE crews();

CREATE TABLE boats();

CREATE TABLE decorates();

CREATE TABLE boats_savings();

CREATE TABLE siblings();

CREATE TABLE parents();