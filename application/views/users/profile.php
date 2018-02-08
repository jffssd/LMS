<h2><?= $title ?></h2>
<div class="row">
	
<div class="col-md-12">

	<div class="col-md-2">
        <!-- To Do Card List card start -->
        <div class="card">
            <div class="card-block"> 
                <section id="task-container">
                    <h3>Logs</h3>
                </section>
            </div>
        </div>
        <!-- To Do Card List card end -->
    </div>

    <div class="col-md-10">
        <!-- To Do Card List card start -->
        <div class="card">
            <div class="card-block"> 
                <section id="task-container">
                <h3>Mensagens</h3>
                <?php
                foreach($mensagens -> result() as $msg){
                    echo '<p>'.$msg->data_envio.' - '.$msg->mensagem.' - '.$msg->autor.'</p>';
                }?>
                </section>
            </div>
        </div>
        <!-- To Do Card List card end -->
    </div>

</div>
