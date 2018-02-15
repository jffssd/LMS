<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?= form_open('transferencia/store')  ?>
	
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="tecnico">Técnico</label><span class="tecnico"><?php echo form_error('tecnico') ?  : ''; ?></span>
			<div class="input-group mb-2">
				<div class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i>
				</div>
				<select name="tecnico" id="tecnico" class="form-control">
						<?php
						foreach($tecnicos -> result() as $t_s){
									echo '<option value="'.$t_s->id.'">'.$t_s->nick.'</option>';
                        }  
                        ?>
				</select>
			</div>
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="jogador">Jogador</label><span class="jogador"><?php echo form_error('jogador') ?  : ''; ?></span>
			<div class="input-group mb-2">
				<div class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i>
				</div>
				<select name="jogador" id="jogador" class="form-control">
						<?php
						foreach($jogadores -> result() as $j_s){
									echo '<option value="'.$j_s->id.'">'.$j_s->nick.'</option>';
                        }  
                        ?>
				</select>
			</div>
		</div>
	</div>
	<div class="form-row">
        <div class="form-group col-md-12">
			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="pessoa1" name="pessoa" class="custom-control-input" value="1" required>
				<label class="custom-control-label" for="pessoa1">Jogador</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
				<input type="radio" id="pessoa2" name="pessoa" class="custom-control-input" value="2">
				<label class="custom-control-label" for="pessoa2">Técnico</label>
			</div>
		</div>
	</div>

	<div class="form-row">
        <div class="form-group col-md-12">
            <label for="equipe">Equipes</label><span class="equipe"><?php echo form_error('equipe') ?  : ''; ?></span>
            <div class="input-group mb-2">
                <div class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <select name="equipe" id="equipe" class="form-control">
                        <?php
                        foreach($equipes -> result() as $e_s){
                                    echo '<option value="'.$e_s->id.'">'.$e_s->nome.'</option>';
                        }  
                        ?>
                </select>
            </div>
        </div>
    </div>

	<div class="form-row">
        <div class="form-group col-md-12">
            <label for="tipo">Tipo:</label><span class="tipo"><?php echo form_error('tipo') ?  : ''; ?></span>
            <div class="input-group mb-2">
                <div class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <select name="tipo" id="tipo" class="form-control">
                        <?php
                            for($i = 1; $i < count($tipos)+1; $i++){
                                echo '<option value="'.$i.'">'.$tipos[$i].'</option>';
                            }
                        ?>
                </select>
            </div>
        </div>
    </div>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="data_transf">Data de Transferencia:</label><span class="data_transf"></span>
			<div class="input-group mb-2">
				<div class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i>
				</div>
				<input type="date" name="data_transf" id="data_transf" class="form-control" value="" placeholder="Data de Transferencia" autofocus="true" />
			</div>
    	</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="cargo">Cargo ID:</label><span class="cargo"></span>
			<div class="input-group mb-2">
				<div class="input-group-addon"><i class="fa fa-facebook" aria-hidden="true"></i>
				</div>
				<input type="number" name="cargo" id="cargo_id" class="form-control" value="" placeholder="Cargo" autofocus="true" />
			</div>
    	</div>
	</div>

			<div class="form-row">
				<div class="col">
					<div class="form-group text-left" style="margin-top:30px; float:right;">
						<?= anchor('transferencia', 'Voltar', 'class="btn btn-secondary"') ?>
					</div>
				</div>
                <div class="col">
					<div class="form-group text-left" style="margin-top:30px;">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
				</div>
			</div>
				<?= form_close(); ?>
		</div>
	</div>	
</div>
