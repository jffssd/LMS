-- MySQL Script generated by MySQL Workbench
-- Fri Nov  3 16:34:19 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema lmdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lmdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lmdb` DEFAULT CHARACTER SET utf8 ;
USE `lmdb` ;

-- -----------------------------------------------------
-- Table `lmdb`.`pais`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `lmdb`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `lmdb`.`status_jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`status_jogador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `formula` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `sobrenome` VARCHAR(50) NOT NULL,
  `nick` VARCHAR(15) NOT NULL,
  `data_nasc` DATETIME NOT NULL,
  `genero` CHAR(1) NOT NULL,
  `funcao` VARCHAR(20) NOT NULL,
  `pais_id` INT NOT NULL,
  `status_jogador_id` INT NOT NULL,
  `at_adap` INT NOT NULL,
  `at_ment` INT NOT NULL,
  `at_consist` INT NOT NULL,
  `at_mec` INT NOT NULL,
  `at_vis` INT NOT NULL,
  `foto` VARCHAR(120) NULL,
  `status_transacao` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jogador_pais_idx` (`pais_id` ASC),
  INDEX `fk_jogador_status_jogador1_idx` (`status_jogador_id` ASC),
  CONSTRAINT `fk_jogador_pais`
    FOREIGN KEY (`pais_id`)
    REFERENCES `lmdb`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_status_jogador1`
    FOREIGN KEY (`status_jogador_id`)
    REFERENCES `lmdb`.`status_jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`pericia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`pericia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  `formula` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_pericia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_pericia` (
  `jogador_id` INT NOT NULL,
  `pericia_id` INT NOT NULL,
  PRIMARY KEY (`jogador_id`, `pericia_id`),
  INDEX `fk_jogador_has_pericia_pericia1_idx` (`pericia_id` ASC),
  INDEX `fk_jogador_has_pericia_jogador1_idx` (`jogador_id` ASC),
  CONSTRAINT `fk_jogador_has_pericia_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `lmdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_has_pericia_pericia1`
    FOREIGN KEY (`pericia_id`)
    REFERENCES `lmdb`.`pericia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_historico` (
  `jogador_id` INT NOT NULL,
  `abates` INT NOT NULL,
  `mortes` INT NOT NULL,
  `assists` INT NOT NULL,
  `media_pontuacao` INT NOT NULL,
  `qtd_jogos` INT NOT NULL,
  PRIMARY KEY (`jogador_id`),
  CONSTRAINT `fk_table1_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `lmdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`regiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`regiao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`campeonato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`campeonato` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `desc` VARCHAR(100) NULL,
  `formato` VARCHAR(45) NOT NULL,
  `max_equip` INT NOT NULL,
  `ano` INT NOT NULL,
  `temporada` CHAR(1) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `equipe_vencedora` INT NULL,
  `regiao_id` INT NOT NULL,
  PRIMARY KEY (`id`, `regiao_id`),
  INDEX `fk_campeonato_regiao1_idx` (`regiao_id` ASC),
  CONSTRAINT `fk_campeonato_regiao1`
    FOREIGN KEY (`regiao_id`)
    REFERENCES `lmdb`.`regiao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_conquista_campeonato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_conquista_campeonato` (
  `jogador_id` INT NOT NULL,
  `campeonato_id` INT NOT NULL,
  PRIMARY KEY (`jogador_id`, `campeonato_id`),
  INDEX `fk_jogador_has_campeonato_campeonato1_idx` (`campeonato_id` ASC),
  INDEX `fk_jogador_has_campeonato_jogador1_idx` (`jogador_id` ASC),
  CONSTRAINT `fk_jogador_has_campeonato_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `lmdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_has_campeonato_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `lmdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`permissao` (
  `id` INT NOT NULL,
  `desc` VARCHAR(45) NOT NULL,
  `obs` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NULL,
  `usuario` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `status` CHAR(1) NOT NULL,
  `tema` VARCHAR(10) NOT NULL,
  `volume` INT NOT NULL,
  `permissao_id` INT NOT NULL,
  PRIMARY KEY (`id`, `permissao_id`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_usuario_permissao1_idx` (`permissao_id` ASC),
  CONSTRAINT `fk_usuario_permissao1`
    FOREIGN KEY (`permissao_id`)
    REFERENCES `lmdb`.`permissao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_custom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_custom` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `nick` VARCHAR(25) NOT NULL,
  `idade` INT NOT NULL,
  `humor` INT NOT NULL,
  `caracteristica` INT NOT NULL,
  `curva` VARCHAR(200) NOT NULL,
  `posicao` VARCHAR(45) NOT NULL,
  `pais_id` INT NOT NULL,
  `status_jogador_id` INT NOT NULL,
  `at_adap` INT NOT NULL,
  `at_ment` INT NOT NULL,
  `at_consist` INT NOT NULL,
  `at_mec` INT NOT NULL,
  `at_vis` INT NOT NULL,
  `foto` VARCHAR(200) NULL,
  `nivel` INT NOT NULL,
  `exp` INT NOT NULL,
  `status_transacao` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`, `pais_id`, `status_jogador_id`),
  INDEX `fk_jogador_custom_pais1_idx` (`pais_id` ASC),
  INDEX `fk_jogador_custom_status_jogador1_idx` (`status_jogador_id` ASC),
  CONSTRAINT `fk_jogador_custom_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `lmdb`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_pais1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `lmdb`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_status_jogador1`
    FOREIGN KEY (`status_jogador_id`)
    REFERENCES `lmdb`.`status_jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_custom_conquista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_custom_conquista` (
  `jogador_custom_id` INT NOT NULL,
  `campeonato_id` INT NOT NULL,
  PRIMARY KEY (`jogador_custom_id`, `campeonato_id`),
  INDEX `fk_jogador_custom_has_campeonato_campeonato1_idx` (`campeonato_id` ASC),
  INDEX `fk_jogador_custom_has_campeonato_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_has_campeonato_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_has_campeonato_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `lmdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_custom_has_pericia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_custom_has_pericia` (
  `jogador_custom_id` INT NOT NULL,
  `pericia_id` INT NOT NULL,
  PRIMARY KEY (`jogador_custom_id`, `pericia_id`),
  INDEX `fk_jogador_custom_has_pericia_pericia1_idx` (`pericia_id` ASC),
  INDEX `fk_jogador_custom_has_pericia_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_has_pericia_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_has_pericia_pericia1`
    FOREIGN KEY (`pericia_id`)
    REFERENCES `lmdb`.`pericia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`usuario_log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`usuario_log` (
  `usuario_id` INT NOT NULL,
  `data_hora` DATETIME NOT NULL,
  `ip` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(50) NOT NULL,
  `mensagem` VARCHAR(50) NOT NULL,
  `objeto` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuario_id`),
  CONSTRAINT `fk_usuario_log_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `lmdb`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_custom_historico_equipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_custom_historico_equipe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipe_id` INT NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`),
  INDEX `fk_jogador_custom_historico_equipe_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_historico_equipe_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_custom_historico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_custom_historico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `media_pont` DECIMAL(10,2) NOT NULL DEFAULT 0,
  `qtd_mvp` INT NOT NULL DEFAULT 0,
  `abates` INT NOT NULL DEFAULT 0,
  `mortes` INT NOT NULL DEFAULT 0,
  `assists` INT NOT NULL DEFAULT 0,
  `qtd_jogos` INT NOT NULL DEFAULT 0,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`),
  INDEX `fk_jogador_custom_historico_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_historico_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`jogador_bonus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`jogador_bonus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `qtd_boostxp` INT NOT NULL,
  `qtd_boostlearn` INT NOT NULL,
  `qtd_boostbonus` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`),
  INDEX `fk_jogador_bonus_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_bonus_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`fonte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`fonte` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `mensagem` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`noticia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` CHAR(1) NOT NULL,
  `mensagem` VARCHAR(100) NOT NULL,
  `equipe1` INT NULL,
  `equipe2` INT NULL,
  `jogador_id` INT NULL,
  `modo` CHAR(1) NOT NULL,
  `img` VARCHAR(200) NULL,
  `semana` INT NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  `camp_id` INT NULL,
  `fonte_id` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`, `fonte_id`),
  INDEX `fk_noticia_jogador_custom1_idx` (`jogador_custom_id` ASC),
  INDEX `fk_noticia_fonte1_idx` (`fonte_id` ASC),
  CONSTRAINT `fk_noticia_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_noticia_fonte1`
    FOREIGN KEY (`fonte_id`)
    REFERENCES `lmdb`.`fonte` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`modulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`modulos` (
  `id` INT NOT NULL,
  `ordem` INT NOT NULL,
  `desc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`modulos_has_permissao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`modulos_has_permissao` (
  `modulos_id` INT NOT NULL,
  `permissao_id` INT NOT NULL,
  PRIMARY KEY (`modulos_id`, `permissao_id`),
  INDEX `fk_modulos_has_permissao_permissao1_idx` (`permissao_id` ASC),
  INDEX `fk_modulos_has_permissao_modulos1_idx` (`modulos_id` ASC),
  CONSTRAINT `fk_modulos_has_permissao_modulos1`
    FOREIGN KEY (`modulos_id`)
    REFERENCES `lmdb`.`modulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_modulos_has_permissao_permissao1`
    FOREIGN KEY (`permissao_id`)
    REFERENCES `lmdb`.`permissao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`atualizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`atualizacao` (
  `id` INT NOT NULL,
  `versao` VARCHAR(45) NOT NULL,
  `log` VARCHAR(300) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`requisito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`requisito` (
  `id` INT NOT NULL,
  `categoria` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`sede` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `capacidade` INT NOT NULL,
  `ambiente` INT NOT NULL,
  `estrutura` INT NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`tecnico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `nick` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `valor` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`equipe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`equipe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `sigla` VARCHAR(10) NOT NULL,
  `regiao_id` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `pais_id` INT NOT NULL,
  `sede_id` INT NOT NULL,
  `tecnico_id` INT NOT NULL,
  `qtd_comissao` INT NOT NULL,
  `logo` VARCHAR(45) NOT NULL,
  `cor_primaria` VARCHAR(45) NOT NULL,
  `cor_secundaria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`, `regiao_id`, `pais_id`, `sede_id`, `tecnico_id`),
  INDEX `fk_equipe_regiao1_idx` (`regiao_id` ASC),
  INDEX `fk_equipe_pais1_idx` (`pais_id` ASC),
  INDEX `fk_equipe_sede1_idx` (`sede_id` ASC),
  INDEX `fk_equipe_tecnico1_idx` (`tecnico_id` ASC),
  CONSTRAINT `fk_equipe_regiao1`
    FOREIGN KEY (`regiao_id`)
    REFERENCES `lmdb`.`regiao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_pais1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `lmdb`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_sede1`
    FOREIGN KEY (`sede_id`)
    REFERENCES `lmdb`.`sede` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_tecnico1`
    FOREIGN KEY (`tecnico_id`)
    REFERENCES `lmdb`.`tecnico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`equipe_banco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`equipe_banco` (
  `id` INT NOT NULL,
  `saldo_banco` DECIMAL(10,2) NULL,
  `equipe_id` INT NOT NULL,
  PRIMARY KEY (`id`, `equipe_id`),
  INDEX `fk_equipe_banco_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_banco_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`profissional` (
  `id` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `ocupacao` VARCHAR(45) NOT NULL,
  `valor` INT NOT NULL,
  `salario` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`equipe_profissional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`equipe_profissional` (
  `equipe_id` INT NOT NULL,
  `profissional_id` INT NOT NULL,
  PRIMARY KEY (`equipe_id`, `profissional_id`),
  INDEX `fk_equipe_has_profissional_profissional1_idx` (`profissional_id` ASC),
  INDEX `fk_equipe_has_profissional_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_has_profissional_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_has_profissional_profissional1`
    FOREIGN KEY (`profissional_id`)
    REFERENCES `lmdb`.`profissional` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`equipe_jogador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`equipe_jogador` (
  `id` INT NOT NULL,
  `salario` DECIMAL(10,2) NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  `equipe_id` INT NOT NULL,
  `jogador_id` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `equipe_id`, `jogador_id`, `jogador_custom_id`),
  INDEX `fk_equipe_jogador_equipe1_idx` (`equipe_id` ASC),
  INDEX `fk_equipe_jogador_jogador1_idx` (`jogador_id` ASC),
  INDEX `fk_equipe_jogador_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_equipe_jogador_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_jogador_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `lmdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_jogador_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `lmdb`.`patrocinador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`patrocinador` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `setor` VARCHAR(45) NOT NULL,
  `investimento` VARCHAR(45) NOT NULL,
  `beneficio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`equipe_patrocinador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`equipe_patrocinador` (
  `equipe_id` INT NOT NULL,
  `patrocinador_id` INT NOT NULL,
  PRIMARY KEY (`equipe_id`, `patrocinador_id`),
  INDEX `fk_equipe_has_patrocinador_patrocinador1_idx` (`patrocinador_id` ASC),
  INDEX `fk_equipe_has_patrocinador_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_has_patrocinador_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_has_patrocinador_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `lmdb`.`patrocinador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`campeonato_tabela`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`campeonato_tabela` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `empates` INT NOT NULL DEFAULT 0,
  `campeonato_id` INT NOT NULL,
  `equipe_id` INT NOT NULL,
  `pontos` INT NOT NULL DEFAULT 0,
  `vitorias` INT NOT NULL DEFAULT 0,
  `derrotas` INT NOT NULL DEFAULT 0,
  `tempo_partida` VARCHAR(45) NOT NULL,
  `abates` INT NOT NULL DEFAULT 0,
  `mortes` INT NOT NULL DEFAULT 0,
  `assists` INT NOT NULL DEFAULT 0,
  `jogos` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`, `campeonato_id`, `equipe_id`),
  INDEX `fk_campeonato_tabela_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_campeonato_tabela_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `lmdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campeonato_tabela_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`campeonato_jogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`campeonato_jogo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ab_t1` INT NOT NULL DEFAULT 0,
  `abt_t2` INT NOT NULL DEFAULT 0,
  `as_t1` INT NOT NULL DEFAULT 0,
  `as_t2` INT NOT NULL DEFAULT 0,
  `mo_t1` INT NOT NULL DEFAULT 0,
  `mo_t2` INT NOT NULL DEFAULT 0,
  `tempo_partida` VARCHAR(45) NOT NULL,
  `equipe_vencedora` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`campeonato_serie_jogo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`campeonato_serie_jogo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `serie_code` VARCHAR(45) NOT NULL,
  `campeonato_id` INT NOT NULL,
  `campeonato_jogo_id` INT NOT NULL,
  PRIMARY KEY (`id`, `campeonato_id`, `campeonato_jogo_id`),
  INDEX `fk_campeonato_has_campeonato_jogo_campeonato_jogo1_idx` (`campeonato_jogo_id` ASC),
  INDEX `fk_campeonato_has_campeonato_jogo_campeonato1_idx` (`campeonato_id` ASC),
  CONSTRAINT `fk_campeonato_has_campeonato_jogo_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `lmdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campeonato_has_campeonato_jogo_campeonato_jogo1`
    FOREIGN KEY (`campeonato_jogo_id`)
    REFERENCES `lmdb`.`campeonato_jogo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`campeonato_confronto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`campeonato_confronto` (
  `id` INT NOT NULL,
  `campeonato_id` INT NOT NULL,
  `equipe_id1` INT NOT NULL,
  `equipe_id2` INT NOT NULL,
  `placar1` INT NOT NULL,
  `placar2` INT NOT NULL,
  `equipe_vit` INT NOT NULL,
  `semana` INT NOT NULL,
  `temporada` INT NOT NULL,
  `status` CHAR(1) NOT NULL,
  `campeonato_serie_jogo_id` INT NOT NULL,
  PRIMARY KEY (`id`, `campeonato_id`, `equipe_id1`, `equipe_id2`, `campeonato_serie_jogo_id`),
  INDEX `fk_campeonato_confronto_campeonato1_idx` (`campeonato_id` ASC),
  INDEX `fk_campeonato_confronto_equipe1_idx` (`equipe_id1` ASC),
  INDEX `fk_campeonato_confronto_equipe2_idx` (`equipe_id2` ASC),
  INDEX `fk_campeonato_confronto_campeonato_serie_jogo1_idx` (`campeonato_serie_jogo_id` ASC),
  CONSTRAINT `fk_campeonato_confronto_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `lmdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campeonato_confronto_equipe1`
    FOREIGN KEY (`equipe_id1`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campeonato_confronto_equipe2`
    FOREIGN KEY (`equipe_id2`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_campeonato_confronto_campeonato_serie_jogo1`
    FOREIGN KEY (`campeonato_serie_jogo_id`)
    REFERENCES `lmdb`.`campeonato_serie_jogo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lmdb`.`transferencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lmdb`.`transferencia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `jogador_custom_id` INT NOT NULL,
  `equipe_id1` INT NOT NULL,
  `equipe_id2` INT NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`, `equipe_id1`, `equipe_id2`),
  INDEX `fk_transferencia_jogador_custom1_idx` (`jogador_custom_id` ASC),
  INDEX `fk_transferencia_equipe1_idx` (`equipe_id1` ASC),
  INDEX `fk_transferencia_equipe2_idx` (`equipe_id2` ASC),
  CONSTRAINT `fk_transferencia_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `lmdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transferencia_equipe1`
    FOREIGN KEY (`equipe_id1`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_transferencia_equipe2`
    FOREIGN KEY (`equipe_id2`)
    REFERENCES `lmdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

