-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema carrinhoCompras
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema carrinhoCompras
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carrinhoCompras` DEFAULT CHARACTER SET utf8 ;
USE `carrinhoCompras` ;

-- -----------------------------------------------------
-- Table `carrinhoCompras`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NULL,
  `valor` FLOAT NOT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`cliente` (
  `cpf` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `dataNascimento` DATE NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cpf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`carrinho` (
  `idcarrinho` INT NOT NULL AUTO_INCREMENT,
  `cliente_cpf` INT NOT NULL,
  PRIMARY KEY (`idcarrinho`, `cliente_cpf`),
  INDEX `fk_carrinho_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_carrinho_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `carrinhoCompras`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`carrinho` (
  `idcarrinho` INT NOT NULL AUTO_INCREMENT,
  `cliente_cpf` INT NOT NULL,
  PRIMARY KEY (`idcarrinho`, `cliente_cpf`),
  INDEX `fk_carrinho_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_carrinho_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `carrinhoCompras`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`carrinho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`carrinho` (
  `idcarrinho` INT NOT NULL AUTO_INCREMENT,
  `cliente_cpf` INT NOT NULL,
  PRIMARY KEY (`idcarrinho`, `cliente_cpf`),
  INDEX `fk_carrinho_cliente1_idx` (`cliente_cpf` ASC),
  CONSTRAINT `fk_carrinho_cliente1`
    FOREIGN KEY (`cliente_cpf`)
    REFERENCES `carrinhoCompras`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`carrinho_has_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`carrinho_has_produto` (
  `carrinho_idcarrinho` INT NOT NULL,
  `produto_idproduto` INT NOT NULL,
  PRIMARY KEY (`carrinho_idcarrinho`, `produto_idproduto`),
  INDEX `fk_carrinho_has_produto_produto1_idx` (`produto_idproduto` ASC),
  INDEX `fk_carrinho_has_produto_carrinho1_idx` (`carrinho_idcarrinho` ASC),
  CONSTRAINT `fk_carrinho_has_produto_carrinho1`
    FOREIGN KEY (`carrinho_idcarrinho`)
    REFERENCES `carrinhoCompras`.`carrinho` (`idcarrinho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carrinho_has_produto_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `carrinhoCompras`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`finalizaCompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`finalizaCompra` (
  `idfinalizaCompra` INT NOT NULL AUTO_INCREMENT,
  `status` ENUM('AB', 'CL') NOT NULL,
  PRIMARY KEY (`idfinalizaCompra`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
