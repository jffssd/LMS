select cp.nome as 'Título do Campeonato', ano as 'Ano', temporada as 'Temporada', st.descricao as 'Formato', pt.descricao as 'Tipo de Playoff', lt.numdetimes as 'Núm. Equipes', lt.numdedivisoes as 'Núm Divisões',
CASE
	WHEN pt.duplaeliminacao = 0 THEN 'N'
    WHEN pt.duplaeliminacao = 1 THEN 'S'
    ELSE 'F'
END AS 'Possui dupla Eliminação?' 
from campeonato cp
join serie_tipo st on cp.serie_tipo = st.id
join playoffs_tipos pt on cp.playoffs_id = pt.id
join liga_tipos lt on cp.liga_tipos_id = lt.id limit 1;