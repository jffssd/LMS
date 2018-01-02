INSERT INTO serie_tipo (descricao, qtd_jogos) VALUES
("Bo1 - Melhor de 1",1),
("Bo2 - Melhor de 1",2),
("Bo3 - Melhor de 1",3),
("Bo5 - Melhor de 1",5);

INSERT INTO playoffs_tipos (descricao, nodetimes, duplaeliminacao) VALUES
("2 Times, Unica Eliminação",2,0),
("4 Times, Unica Eliminação",4,0),
("8 Times, Unica Eliminação",8,0),
("16 Times, Unica Eliminação",16,0),
("32 Times, Unica Eliminação",32,0);

INSERT INTO liga_tipos (descricao, numdetimes, numdedivisoes, jogarinterdiv) VALUES
("6 times e 1 divisão", 6,1,"N"),
("8 times e 1 divisão", 8,1,"N"),
("8 times e 2 divisões", 8,2,"N"),
("8 times e 2 divisões e jogos interdivisões", 8,2,"S"),
("12 times e 1 divisão", 12,1,"N"),
("12 times e 2 divisões", 12,2,"N"),
("12 times e 2 divisões e jogos interdivisões", 12,2,"S"),
("16 times e 1 divisão", 16,1,"N"),
("16 times e 2 divisões", 16,2,"N"),
("16 times e 2 divisões e jogos interdivisões", 16,2,"S"),
("18 times e 1 divisão", 18,1,"N"),
("18 times e 2 divisões", 18,2,"N"),
("18 times e 2 divisões e jogos interdivisões", 18,2,"S"),
("24 times e 1 divisão", 24,1,"N"),
("24 times e 2 divisões", 24,2,"N"),
("24 times e 2 divisões e jogos interdivisões", 24,2,"S"),
("32 times e 1 divisão", 32,1,"N"),
("32 times e 2 divisões", 32,2,"N"),
("32 times e 2 divisões e jogos interdivisões", 32,2,"S");

INSERT INTO campeonato (nome, ano, temporada, playoffs_id, liga_tipos_id, status, serie_tipo, regiao_id) VALUES
("Campeonato Brasileiro de League of Legends - 2012", 2012, 1, 3, 2, "C", 1, 1),
("Campeonato Brasileiro de League of Legends - 2013", 2013, 1, 3, 2, "C", 1, 1),
("Liga Brasileira - Série dos Campeões League of Legends 2014", 2014, 1, 3, 3, "C", 1, 1),
("Campeonato Brasileiro de League of Legends - 2014", 2014, 2, 3, 3, "C", 1, 1),
("CBLoL - 1a Etapa - Campeonato Brasileiro de League of Legends - 2015", 2015, 1, 3, 3, "C", 1, 1),
("CBLoL - 2a Etapa - Campeonato Brasileiro de League of Legends - 2015", 2015, 2, 3, 3, "C", 1, 1),
("CBLoL - Pós-Temporada - Campeonato Brasileiro de League of Legends - 2015", 2015, 2, 3, 3, "C", 1, 1),
("CBLoL - 1a Etapa - Campeonato Brasileiro de League of Legends - 2016", 2016, 1, 3, 3, "C", 1, 1),
("CBLoL - 2a Etapa - Campeonato Brasileiro de League of Legends - 2016", 2016, 2, 3, 3, "C", 1, 1),
("CBLoL - 1a Etapa - Campeonato Brasileiro de League of Legends - 2017", 2017, 1, 3, 3, "C", 1, 1),
("CBLoL - 2a Etapa - Campeonato Brasileiro de League of Legends - 2017", 2017, 2, 3, 3, "C", 1, 1);