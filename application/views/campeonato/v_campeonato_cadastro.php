<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
<?= form_open('campeonatos/processar_inclusao')  ?>
<div class="form-group">
	<label for="nome">Nome</label>
	<input type="text" name="nome" id="nome" class="form-control" value="campeonato_teste($var)"/>
</div>
	<div class="form-group">
	<label for="ano"></label>
	<input type="number" name="ano" id="ano" class="form-control" value="2018" />
</div>
	<div class="form-group">
	<label for="temporada"></label>
	<input type="number" name="temporada" id="temporada" class="form-control" value="1" />
</div>
<div class="form-group">
	<label for="playoffs_id"></label>
	<input type="number" name="playoffs_id" id="playoffs_id" class="form-control" value="3" />
</div>
<div class="form-group">
	<label for="camp_formato_id"></label>
	<input type="number" name="camp_formato_id" id="camp_formato_id" class="form-control" value="2" />
</div>
<div class="form-group">
	<label for="regiao_id"></label>
	<input type="number" name="regiao_id" id="regiao_id" class="form-control" value="1" />
</div>
<div class="form-group">
    <select name="equipes[]" id="equipes" size="8" multiple>
        <option value="1">PNG</option>
        <option value="2">RED</option>
        <option value="3">BRAVE</option>
        <option value="4">CNB</option>
        <option value="5">VFK</option>
        <option value="6">OPK</option>
        <option value="7">PRG</option>
        <option value="8">ONE</option>
    </select>
</div>
<div class="form-group text-right">
	<input type="submit" value="Salvar" class="btn btn-success" />
</div>
	<?= form_close(); ?>

<?= anchor('campeonato', 'Voltar', 'btn btn-secondary') ?>

</div>