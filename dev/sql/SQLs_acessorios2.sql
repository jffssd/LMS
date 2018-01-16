INSERT INTO PERMISSAO (descricao, obs) VALUES
('admin', 'Administrador do Sistema'),
('mod', 'Moderador do Sistema'),
('user', 'Usuários do sistema'),
('guest', 'Visitantes');

INSERT INTO USUARIO (nome, sobrenome, usuario, email, senha, status, tema, volume, permissao_id) VALUES
('Administrador','ADM', 'admin', 'admin@esportsmanager.com.br', '12345', 1, 'default', 30, 1);

INSERT INTO JOGADOR_CUSTOM (usuario_id, nome, nick, sobrenome,  data_nasc, funcao_id, pais_id, personalidade_id, at_trab, at_ment, at_consist, at_mec, at_vis, foto, nivel, exp, status_transacao) VALUES
(1, 'Custom', 'CstmPlayer', 'Player', '2018-01-15', 1, 28, 1, 1, 1, 1, 1, 1, 'foto.jpg', 0, 0, 1);
