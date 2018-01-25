Nome: <?php echo $nome;?><br>
Nick: <?php echo $nick;?><br>
Sobrenome: <?php echo $sobrenome;?><br>
Foto: <?php echo $foto;?><br>
Data Nascimento: <?php echo $data_nasc;?><br>
Genero: <?php echo $genero;?><br>
Função ID: <?php echo $funcao_id;?><br>
Pais ID: <?php echo $pais_id;?><br>
Personalidade ID: <?php echo $personalidade_id;?><br>
Trabalho em Equipe: <?php echo $at_trab;?><br>
Mentalidade: <?php echo $at_ment;?><br>
Consistência: <?php echo $at_consist;?><br>
Mecânicas: <?php echo $at_mec;?><br>
Visão de Jogo: <?php echo $at_vis;?><br>
Status: <?php echo $status;?><br>
Teste: <?php echo $teste;?><br>
<style>
.bloco{
    width:50px;
    height:50px;
    margin:2px;
    background-color:red;
    opacity: 0.6;
    filter: alpha(opacity=60); /* For IE8 and earlier */
}
.bloco:hover{
    color:white;
    opacity: 1;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
.bloco img{
    width:50px;
    height:50px;
    border-radius:5px;
}

</style>

<?php 
$count = 0;
for($i = 1; $i <= 5; $i++){ ?>
    <div class="row">
    <?php
    for($j = 1; $j <= 5; $j++){
        $count++;?>
        <div class="bloco"><img class="" src="<?php echo site_url();?>assets/img/profiles/dudu.jpg"></div>
    <?php } ?>
    </div>
<?php } ?>




