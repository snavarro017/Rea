<div class="pull-right">
	<a href="<?php echo site_url('tenerusuario/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Hora</th>
		<th>Fecha</th>
		<th>NombreUsuario</th>
		<th>NombreEstadoUsuario</th>
		<th>FechaFin</th>
		<th>Actions</th>
    </tr>
	<?php foreach($tenerusuario as $t){ ?>
    <tr>
		<td><?php echo $t['hora']; ?></td>
		<td><?php echo $t['fecha']; ?></td>
		<td><?php echo $t['nombreUsuario']; ?></td>
		<td><?php echo $t['nombreEstadoUsuario']; ?></td>
		<td><?php echo $t['fechaFin']; ?></td>
		<td>
            <a href="<?php echo site_url('tenerusuario/edit/'.$t['hora']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('tenerusuario/remove/'.$t['hora']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>