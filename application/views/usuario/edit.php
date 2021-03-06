<?php  echo form_open('usuario/edit/'.$usuario['nombreUsuario'], array("class"=>"form-horizontal")); ?>
<br/>
<div class="col-md-offset-2 col-md-8">
	<div class="container box box-primary">
		<br/>
		<?php
        if ($this->session->rol == 'administrador de usuarios') {
            echo'<div class="col-md-1">
					<a href="'.base_url().'usuario"><div class="btn btn-success logeo"><i class="fa fa-reply"></i></div></a>
				</div>';
        } else if ($this->session->rol == 'super administrador') {
            echo'<div class="col-md-1">
					<a href="'.base_url().'usuario/listaAdmin"><div class="btn btn-success logeo"><i class="fa fa-reply"></i></div></a>
				</div>';
        } ?>
		<br/>
		<div>
			<h1>Editar Usuario</h1><br/>
			<div class="form-group">
				<label for="usuario" class="col-md-4 control-label">Usuario</label>
				<div class="col-md-6">
					<strong name="usuario" id="usuario" class="form-control">
					<?php
						echo $usuario["nombreUsuario"];   
					?>
					</strong>
				</div>
			</div>
			<div class="form-group">
				<label form="estados" class="col-md-4 control-label">Elija un estado</label>
				<div class="col-md-6">
					<?php
            			$estados=$this->EstadoUsuario_model->get_all_estadoUsuario();
            			foreach ($estados as $unEstado) {
        	    			$arrEstado[$unEstado["nombre"]]= $unEstado["nombre"];
        				}
        				echo form_dropdown('estados', $arrEstado, array($usuario['nombreEstadoUsuario']), "class=form-control");
					?>
				</div>
			</div>
			<div class="form-group">
				<label for="roles" class="col-md-4 control-label">Elija un rol</label>
				<div class="col-md-6">
					<?php
        				$roles=$this->Rol_model->get_all_rol();
       					foreach ($roles as $unRol) {
        				    $arrRol[$unRol["nombre"]]= $unRol["nombre"];
        				}
        				echo form_dropdown('roles', $arrRol, array($usuario['nombreRol']), "class=form-control");
    				?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-8">
					<button type="submit" class="btn btn-success">Actualizar</button>
				</div>
			</div>
			<br/>
		</div>
	</div>
</div>
<?php echo form_close();?>
