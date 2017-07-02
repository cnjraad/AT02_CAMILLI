
<!--Form with header-->
<form action="insere" method="post">
<div class="card mt-5">
    <div class="card-block">

        <!--Header-->
        <div class="form-header blue">
            <h3><i class="fa fa-user"></i> Register:</h3>
        </div>

        <!--Body-->
        <div class="md-form">
            <i class="fa fa-user prefix"></i>
            <input type="text" value="<?php echo isset($table_data['nome'])?$table_data['nome']:''?>" name="input_nome" id="form3" class="form-control">
            <label for="form3">Nome</label>
        </div>
        <div class="md-form">
            <i class="fa fa-envelope prefix"></i>
            <input type="text" value="<?php echo isset($table_data['snome'])?$table_data['snome']:''?>" name="input_snome" id="form2" class="form-control">
            <label for="form2">Sobrenome</label>
        </div>

        <div class="md-form">
            <i class="fa fa-lock prefix"></i>
            <input type="number" value="<?php echo isset($table_data['idade'])?$table_data['idade']:''?>" name="input_idade" id="form4" class="form-control">
            <label for="form4">Idade</label>
        </div>

		<fieldset class="form-group">
		    <input type="radio" name="input_sexo" value=0>
		    <label class="mr-5" for="checkbox1">Feminino</label>
		    
		    <input type="radio" name="input_sexo" value=1>
		    <label for="checkbox2">Masculino</label>
		</fieldset>

        <div class="text-center">
            <button class="btn btn-indigo">Registrar</button><hr>
        </div>

    </div>
</div>
</form>
<!--/Form with header-->
