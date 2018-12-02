<div class="container py-5">
	<div class="col-md-6 mx-auto">
		<div class="container" id="transparencia">
  			<form id="formulario" method="post" action="registro" onsubmit="return validarRegistro();">
			<?php 
			if(isset($mensaje)){
			echo $mensaje;
			}
			?> 
			  <h1 class="titulo">Registro Usuario</h1>
    			<div class="form-group">
					<label class="label" for="nombre">Nombre (*)</label>
					<input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" minlength="3" maxlength="25" >
				</div>
				<div class="form-group">
					<label class="label" for="apellido">Apellido (*)</label>
					<input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" minlength="4" maxlength="30" >
				</div>
				<div class="form-group">
					<label class="label" for="dni">Numero de Documento</label>
					<input type="text" class="form-control" id="dni" placeholder="Numero de Documento" minlength="7" maxlength="12" name="dni">
				</div>
				<div class="form-group">
					<label class="label" for="estudio">Terciario/Universidad (*)</label>
					<input type="text" class="form-control" id="estudio" minlength="6" maxlength="35" placeholder="Terciario o Universidad" name="estudio">
				</div>
				<div class="form-group">
					<label class="label" for="email">Correo Electronico (*)</label>
					<input type="email" class="form-control" id="email" placeholder="Correo@ejemplo.com" name="email" minlength="10" maxlength="40" >
				</div>
				<div class="form-group">
					<label class="label" for="nombreUsuario">Nombre de Usuario (*)</label>
  	  	  			<input type="text" class="form-control" id="nombreUsuario" placeholder="Nombre Usuario" name="nombreUsuario" minlength="6" maxlength="15"  >
  	 	  		</div>
  		  		<div class="form-group">
					<label class="label" for="clave">Contraseña (*)</label>
      				<input type="password" class="form-control" id="clave" placeholder="Ingrese Contraseña" name="clave" minlength="8" maxlength="15" >
				</div>
				<div class="form-group">
					<label class="label" for="clave">Confirmar Contraseña (*)</label>
      				<input type="password" class="form-control" id="clave2" placeholder="Reingrese Contraseña" name="clave2" minlength="8" maxlength="15" >
				</div>
				<div class="form-group" id="boton">
					<button type="submit" class="btn btn-success">Enviar</button>
				</div>
			</form>
		</div> <!-- Cierre del container -->
	</div> <!-- Cierre de la clase col -->
</div> <!-- Cierre del container final -->