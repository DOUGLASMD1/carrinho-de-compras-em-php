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
-- Table `carrinhoCompras`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`estado` (
  `Uf` VARCHAR(5) NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Uf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carrinhoCompras`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carrinhoCompras`.`municipio` (
  `Id` INT NOT NULL AUTO_INCREMENT,
  `Codigo` INT NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  `estado_Uf` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`Id`, `estado_Uf`),
  INDEX `fk_municipio_estado1_idx` (`estado_Uf` ASC),
  CONSTRAINT `fk_municipio_estado1`
    FOREIGN KEY (`estado_Uf`)
    REFERENCES `carrinhoCompras`.`estado` (`Uf`)
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
  `carrinho_idcarrinho` INT NOT NULL,
  `status` ENUM('AB', 'CL') NOT NULL,
  `municipio_Id` INT NOT NULL,
  PRIMARY KEY (`idfinalizaCompra`, `carrinho_idcarrinho`, `municipio_Id`),
  INDEX `fk_confirmaCompra_carrinho1_idx` (`carrinho_idcarrinho` ASC),
  INDEX `fk_finalizaCompra_municipio1_idx` (`municipio_Id` ASC),
  CONSTRAINT `fk_confirmaCompra_carrinho1`
    FOREIGN KEY (`carrinho_idcarrinho`)
    REFERENCES `carrinhoCompras`.`carrinho` (`idcarrinho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_finalizaCompra_municipio1`
    FOREIGN KEY (`municipio_Id`)
    REFERENCES `carrinhoCompras`.`municipio` (`Id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


Insert into Estado (Uf, Nome) values ('AC', 'Acre');
Insert into Estado (Uf, Nome) values ('AL', 'Alagoas');
Insert into Estado (Uf, Nome) values ('AP', 'Amapá');
Insert into Estado (Uf, Nome) values ('AM', 'Amazonas');
Insert into Estado (Uf, Nome) values ('BA', 'Bahia');
Insert into Estado (Uf, Nome) values ('CE', 'Ceará');
Insert into Estado (Uf, Nome) values ('DF', 'Distrito Federal');
Insert into Estado (Uf, Nome) values ('ES', 'Espírito Santo');
Insert into Estado (Uf, Nome) values ('GO', 'Goiás');
Insert into Estado (Uf, Nome) values ('MA', 'Maranhão');
Insert into Estado (Uf, Nome) values ('MT', 'Mato Grosso');
Insert into Estado (Uf, Nome) values ('MS', 'Mato Grosso do Sul');
Insert into Estado (Uf, Nome) values ('MG', 'Minas Gerais');
Insert into Estado (Uf, Nome) values ('PA', 'Pará');
Insert into Estado (Uf, Nome) values ('PB', 'Paraíba');
Insert into Estado (Uf, Nome) values ('PR', 'Paraná');
Insert into Estado (Uf, Nome) values ('PE', 'Pernambuco');
Insert into Estado (Uf, Nome) values ('PI', 'Piauí');
Insert into Estado (Uf, Nome) values ('RJ', 'Rio de Janeiro');
Insert into Estado (Uf, Nome) values ('RN', 'Rio Grande do Norte');
Insert into Estado (Uf, Nome) values ('RS', 'Rio Grande do Sul');
Insert into Estado (Uf, Nome) values ('RO', 'Rondônia');
Insert into Estado (Uf, Nome) values ('RR', 'Roraima');
Insert into Estado (Uf, Nome) values ('SC', 'Santa Catarina');
Insert into Estado (Uf, Nome) values ('SP', 'São Paulo');
Insert into Estado (Uf, Nome) values ('SE', 'Sergipe');
Insert into Estado (Uf, Nome) values ('TO', 'Tocantins');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
