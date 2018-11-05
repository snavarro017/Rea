<div class="pull-right" id="accion">
	<a href="<?php echo site_url('tenerusuario/add'); ?>" class="btn btn-success">Agregar</a> 
</div>
<table class="table table-light table-bordered">
    <tr id="tabla">
		<th>Hora</th>
		<th>Fecha</th>
		<th>Nombre Usuario</th>
		<th>Nombre Estado Usuario</th>
		<th>Fecha Fin</th>
		<th>Actualizar</th>
    </tr>
	<?php foreach($tenerusuario as $t){ ?>
    <tr>
		<td><?php echo $t['hora']; ?></td>
		<td><?php echo $t['fecha']; ?></td>
		<td><?php echo $t['nombreUsuario']; ?></td>
		<td><?php echo $t['nombreEstadoUsuario']; ?></td>
		<td><?php echo $t['fechaFin']; ?></td>
		<td>
		<?php echo form_open("tenerusuario/add",array("method"=>'get'),array("nombreUsuario"=>$t['nombreUsuario'],"fecha"=>$t['fecha'],"hora"=>$t['hora'])); ?>
            <button type="submit" class="btn btn-info btn-xs">Editar</button> 
			<?php echo form_close();?>
			
			
        </td>
    </tr>
	<?php } ?>
</table>