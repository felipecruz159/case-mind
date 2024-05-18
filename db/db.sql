CREATE DATABASE case_mind;
USE case_mind;

CREATE TABLE login(
    id_usuario int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    usuario VARCHAR(60) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE produtos(
    id_produtos int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    quantidade int NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    foto VARCHAR(255) NULL
);