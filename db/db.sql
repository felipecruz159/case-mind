CREATE DATABASE case_mind;
USE case_mind;

CREATE TABLE login(
    id_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    senha VARCHAR(32) NOT NULL
);

CREATE TABLE produtos(
    id_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
);

CREATE TABLE estoque(
    id_estoque INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL
)

CREATE TABLE historico(
    id_transacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_produto INT NOT NULL,
    tipo VARCHAR(7) NOT NULL,
    quantidade INT NOT NULL
)