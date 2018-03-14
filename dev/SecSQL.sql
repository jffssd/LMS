
CREATE TABLE IF NOT EXISTS `cesdb`.`config_campanha_jogador_custom` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_jogador_custom` INT NOT NULL,
  `jogadores_legado` TINYINT NOT NULL DEFAULT 0,
  `dificuldade` TINYINT NOT NULL,
  `moeda` VARCHAR(3) NOT NULL,
  `agressividade_mercado` TINYINT NOT NULL,
  `limite_janela_transf` TINYINT NOT NULL,
  `velocidade_partida` TINYINT NOT NULL,
   PRIMARY KEY (`id`),
CONSTRAINT `fk_config_campanha_jogador_custom_fk`
    FOREIGN KEY (`id_jogador_custom`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_conquista_campeonato` (
  `jogador_id` INT NOT NULL,
  `campeonato_id` INT NOT NULL,
  PRIMARY KEY (`jogador_id`, `campeonato_id`),
  INDEX `fk_jogador_has_campeonato_campeonato1_idx` (`campeonato_id` ASC),
  INDEX `fk_jogador_has_campeonato_jogador1_idx` (`jogador_id` ASC),
  CONSTRAINT `fk_jogador_has_campeonato_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `cesdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_has_campeonato_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `cesdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `sobrenome` VARCHAR(45) NOT NULL,
  `nick` VARCHAR(15) NOT NULL,
  `idade` INT NOT NULL,
  `data_criacao` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `funcao_id` INT NOT NULL,
  `pais_id` INT NOT NULL,
  `personalidade_id` INT NOT NULL,
  `at_trab` INT NOT NULL,
  `at_ment` INT NOT NULL,
  `at_consist` INT NOT NULL,
  `at_mec` INT NOT NULL,
  `at_vis` INT NOT NULL,
  `foto` VARCHAR(200) NULL,
  `nivel` INT NOT NULL,
  `exp` INT NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`, `usuario_id`, `pais_id`, `personalidade_id`),
  INDEX `fk_jogador_custom_pais1_idx` (`pais_id` ASC),
  INDEX `fk_jogador_custom_personalidade1_idx` (`personalidade_id` ASC),
  CONSTRAINT `fk_jogador_custom_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `cesdb`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_pais1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `cesdb`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_funcao`
    FOREIGN KEY (`funcao_id`)
    REFERENCES `cesdb`.`funcao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_personalidade1`
    FOREIGN KEY (`personalidade_id`)
    REFERENCES `cesdb`.`personalidade_jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom_conquista` (
  `jogador_custom_id` INT NOT NULL,
  `campeonato_id` INT NOT NULL,
  PRIMARY KEY (`jogador_custom_id`, `campeonato_id`),
  INDEX `fk_jogador_custom_has_campeonato_campeonato1_idx` (`campeonato_id` ASC),
  INDEX `fk_jogador_custom_has_campeonato_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_has_campeonato_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_has_campeonato_campeonato1`
    FOREIGN KEY (`campeonato_id`)
    REFERENCES `cesdb`.`campeonato` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom_has_pericia` (
  `jogador_custom_id` INT NOT NULL,
  `pericia_id` INT NOT NULL,
  PRIMARY KEY (`jogador_custom_id`, `pericia_id`),
  INDEX `fk_jogador_custom_has_pericia_pericia1_idx` (`pericia_id` ASC),
  INDEX `fk_jogador_custom_has_pericia_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_has_pericia_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogador_custom_has_pericia_pericia1`
    FOREIGN KEY (`pericia_id`)
    REFERENCES `cesdb`.`pericia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom_historico_equipe` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipe_id` INT NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`),
  INDEX `fk_jogador_custom_historico_equipe_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_historico_equipe_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom_historico` (
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
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`jogador_custom_bonus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `qtd_boostxp` INT NOT NULL,
  `qtd_boostlearn` INT NOT NULL,
  `qtd_boostbonus` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `jogador_custom_id`),
  INDEX `fk_jogador_custom_bonus_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_jogador_custom_bonus_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `cesdb`.`sede` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `capacidade` INT NOT NULL,
  `ambiente` INT NOT NULL,
  `estrutura` INT NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`equipe_banco` (
  `id` INT NOT NULL,
  `saldo_banco` DECIMAL(10,2) NULL,
  `equipe_id` INT NOT NULL,
  PRIMARY KEY (`id`, `equipe_id`),
  INDEX `fk_equipe_banco_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_banco_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `cesdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`equipe_jogador_custom` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `salario` DECIMAL(10,2) NOT NULL,
  `temporada` INT NOT NULL,
  `ano` INT NOT NULL,
  `titular` CHAR(1) NOT NULL,
  `equipe_id` INT NOT NULL,
  `jogador_id` INT NOT NULL,
  `jogador_custom_id` INT NOT NULL,
  PRIMARY KEY (`id`, `equipe_id`, `jogador_id`, `jogador_custom_id`),
  INDEX `fk_equipe_jogador_custom_equipe1_idx` (`equipe_id` ASC),
  INDEX `fk_equipe_jogador_custom_jogador1_idx` (`jogador_id` ASC),
  INDEX `fk_equipe_jogador_custom_jogador_custom1_idx` (`jogador_custom_id` ASC),
  CONSTRAINT `fk_equipe_jogador_custom_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `cesdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_jogador_custom_jogador1`
    FOREIGN KEY (`jogador_id`)
    REFERENCES `cesdb`.`jogador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_jogador_custom_jogador_custom1`
    FOREIGN KEY (`jogador_custom_id`)
    REFERENCES `cesdb`.`jogador_custom` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`patrocinador` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `setor` VARCHAR(45) NOT NULL,
  `investimento` VARCHAR(45) NOT NULL,
  `beneficio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `cesdb`.`equipe_patrocinador` (
  `equipe_id` INT NOT NULL,
  `patrocinador_id` INT NOT NULL,
  PRIMARY KEY (`equipe_id`, `patrocinador_id`),
  INDEX `fk_equipe_has_patrocinador_patrocinador1_idx` (`patrocinador_id` ASC),
  INDEX `fk_equipe_has_patrocinador_equipe1_idx` (`equipe_id` ASC),
  CONSTRAINT `fk_equipe_has_patrocinador_equipe1`
    FOREIGN KEY (`equipe_id`)
    REFERENCES `cesdb`.`equipe` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipe_has_patrocinador_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `cesdb`.`patrocinador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO sede (nome, capacidade, ambiente, estrutura, valor) VALUES 
('Casa simples de aluguel', 7, 1, 1, 50000.00),
('Apartamento de aluguel', 8, 2, 2, 650000.00),
('Imóvel residencial', 7, 3, 2, 80000.00),
('Gaming House pequena', 9, 3, 3, 100000.00),
('Gaming House média', 10, 4, 3, 120000.00),
('Gaming House grande', 12, 4, 4, 150000.00),
('Centro de e-Sports', 15, 5, 5, 250000.00);


INSERT INTO jogador_custom (usuario_id, nome, nick, sobrenome,  idade, funcao_id, pais_id, personalidade_id, at_trab, at_ment, at_consist, at_mec, at_vis, foto, nivel, exp, status) VALUES
(1, 'Custom', 'CstmPlayer', 'Player', 16, 1, 28, 1, 1, 1, 1, 1, 1, 'foto.jpg', 0, 0, 'A');
