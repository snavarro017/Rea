<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container" id="transparencia">
           <?php echo form_open("recuperarcuenta/index",array("method"=>'get'));?> 
  			
			<?php 
			if(isset($mensaje)){
			echo $mensaje;
			}
			?> 
			  <h1>Recuperar clave</h1>
                </br>
  		  		<div class="form-group">
					<label class="label" for="clave"><i class="fa fa-user"></i> Usuario</label>
      				<input type="text" class="form-control" id="nombreUsuario" placeholder="Ingrese el usuario" name="nombreUsuario"  required>
				</div>
				
				<div class="form-group" >
					<button type="submit" id="enviarmail" class="btn btn-success">Enviar</button>
				</div>
				<div id="loading" hidden>Cargando... <span class="fa fa-spinner fa-spin"></span></div>
			  <?php echo form_close();?> 
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->
