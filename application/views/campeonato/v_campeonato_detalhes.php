<h2>Informações do Campeonato</h2>

ID: <?php echo $id;?><br>
Nome: <?php echo $nome;?><br>
Logo: <?php echo $logo;?><br>
Ano: <?php echo $ano;?><br>
Temporada: <?php echo $temporada;?><br>
Núm. Divisões: <?php echo $numDeDivisoes;?><br>

Região ID: <?php echo $regiao_id;?><br>
Região: <?php echo $regiao_sigla;?><br>

<h3>Fase de Grupos - Info</h3>

Núm. Times: <?php echo $fg_numDeTimes;?><br>
Qtd. jogos série: <?php echo $fg_qtd_jogos_serie;?><br>

<h3>Fase Playoffs - Info</h3>

Núm. Times: <?php echo $pl_numDeTimes;?><br>
Qtd. jogos série: <?php echo $pl_qtd_jogos_serie;?><br>
Qtd. jogos série final: <?php echo $pl_qtd_jogos_serie_final;?><br>

<p><a href="<?php echo base_url('campeonatos');?>">Voltar</a></p>
