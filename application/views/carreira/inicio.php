  <?php

  foreach($jogador_custom -> result() as $j_c){
    echo '<p>'.$j_c->nome.'</p>';
    echo '<p>'.$j_c->nick.'</p>';
    echo '<p>'.$j_c->sobrenome.'</p>';

  } 
  ?>