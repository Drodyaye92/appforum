CREATE DATABASE IF NOT EXISTS developpeur;

CREATE TABLE IF NOT EXISTS commentaire(
    ID_com int NOT NULL AUTO_INCREMENT,
    message_com TEXT NOT NULL,
    date_com DATE,
    PRIMARY KEY(ID_com)
);

CREATE TABLE IF NOT EXISTS publication(
    ID_pub int NOT NULL AUTO_INCREMENT,
    message_pub TEXT NOT NULL,
    date_pub DATE,
    ID_com int,
    PRIMARY KEY(ID_pub),
    FOREIGN KEY (ID_com) REFERENCES commentaire(ID_com)
);

CREATE TABLE IF NOT EXISTS dev(
    ID_dev int NOT NULL AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    prenom VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(50) NOT NULL,
    role_dev VARCHAR(10) NOT NULL,
    ID_pub int,
    PRIMARY KEY(ID_dev),
    FOREIGN KEY (ID_pub) REFERENCES publication(ID_pub)

)

CREATE TABLE IF NOT EXISTS info(
    ID_dev int,
    ID_com int,
    FOREIGN KEY (ID_dev) REFERENCES dev(ID_dev),
    FOREIGN KEY (ID_com) REFERENCES commentaire(ID_com)
)