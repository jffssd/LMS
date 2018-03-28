<div class="col-md-6">
    <img src="<?php echo site_url();?>assets/img/jogadores/<?php echo $foto;?>" height="250" width="250" style="border: 1px solid black;">
</div>
Nome: <?php echo $nome;?><br>
Nick: <?php echo $nick;?><br>
Sobrenome: <?php echo $sobrenome;?><br>

Idade: <?php echo $idade;?><br>
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

<style>
.bloco{
    width:50px;
    height:50px;
    margin:2px;
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

<div class="col-md-6">
<canvas id="line-chart" width="800" height="450"></canvas>
</div>
<?php 
$count = 0;
for($i = 1; $i <= 2; $i++){ ?>
    <div class="row">
    <?php
    for($j = 1; $j <= 5; $j++){
        $count++;?>
        <div class="bloco"><img class="" src="<?php echo site_url();?>assets/img/profiles/dudu.jpg"></div>
    <?php } ?>
    </div>
<?php } ?>




<script>
new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: ['Jan/2018','Fev/2018','Mar/2018','Abr/2018','Mai/2018','Jun/2018'],
    datasets: [{ 
        data: [84,82,87,88,87,89],
        label: "Pontuação",
        borderColor: "#3e95cd",
        fill: true
      }
    ]
  },
  options: {
    title: {
      display: false,
    },
    elements: {
            line: {
                tension: 0.1, // disables bezier curves
            }
        }
  }
});
</script>