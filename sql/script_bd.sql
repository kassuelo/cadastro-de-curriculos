-- Criação do banco de dados
DROP DATABASE IF EXISTS trab2_bd;
CREATE DATABASE trab2_bd;
USE trab2_bd;

-- Criação da tabela de usuarios
CREATE TABLE usuario (
	ID INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	login VARCHAR(255) NOT NULL,
	senha VARCHAR(255) NOT NULL,
	nivel_acesso VARCHAR(255) NOT NULL,
	PRIMARY KEY (ID));

-- Criação da tabela de pessoa
CREATE TABLE pessoa (
	`ID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`ID_usuario` INT UNSIGNED ZEROFILL NOT NULL,
	`nome` VARCHAR(255) NOT NULL,
	`sobrenome` VARCHAR(255) NOT NULL,
	`sexo` VARCHAR(255) NOT NULL,
	`data_nasc` VARCHAR(255) NOT NULL,
	`CPF` VARCHAR(255),
	`telefone` VARCHAR(255),
	`email` VARCHAR(255),
    PRIMARY KEY (`ID`),
    CONSTRAINT `fk_ID_usuario` FOREIGN KEY (`ID_usuario`) REFERENCES usuario (`ID`)
);

-- Criação da tabela de currículos
CREATE TABLE curriculo (
	`ID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`ID_pessoa` INT UNSIGNED ZEROFILL NOT NULL,
	`nome` VARCHAR(255) NOT NULL,
	`sobrenome` VARCHAR(255) NOT NULL,
	`idade` INT UNSIGNED NOT NULL,
	`email` VARCHAR(255),
	`CPF` VARCHAR(255),
	`experiencias` TEXT,
	`escolaridade` VARCHAR(255) NOT NULL,
	`area_atuacao` VARCHAR(255) NOT NULL,
	`idiomas` VARCHAR(255) NOT NULL,
	`CNH` VARCHAR(255) NOT NULL,
	`foto` LONGBLOB,
	PRIMARY KEY (ID),
	CONSTRAINT `fk_ID_pessoa` FOREIGN KEY (`ID_pessoa`) REFERENCES pessoa (`ID`));

-- Criação da tabela de empresas
CREATE TABLE empresa (
	`ID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`razao_social` VARCHAR(255) NOT NULL,
	`nome_fantasia` VARCHAR(255) NOT NULL,
	`endereco` VARCHAR(255) NOT NULL,
	`cidade` VARCHAR(255) NOT NULL,
	`estado` VARCHAR(255) NOT NULL,
	`telefone` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	`CNPJ` VARCHAR(255) NOT NULL,
	`inscricao_estadual` VARCHAR(255) NOT NULL,
	`inscricao_municipal` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`ID`)
);

-- Criação da tabela de vagas
CREATE TABLE vagas (
	`ID` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
	`ID_empresa` INT UNSIGNED ZEROFILL NOT NULL,
	`cargo` VARCHAR(255) NOT NULL,
	`area_atuacao` VARCHAR(255) NOT NULL,
	`qtd_vagas` INT NOT NULL,
	`endereco` VARCHAR(255) NOT NULL,
	`cidade` VARCHAR(255) NOT NULL,
	`estado` VARCHAR(255) NOT NULL,
	`telefone` VARCHAR(255) NOT NULL,
	`email` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`ID`),
	CONSTRAINT `fk_ID_empresa` FOREIGN KEY (`ID_empresa`) REFERENCES empresa (`ID`)
);


