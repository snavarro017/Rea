<style>.avatar >img{height:100%;}
.starStatic a{
	font-size:x-large;
	font-weight:bold;
	color:#18acba;
}
.starStaticWhite a{
	font-weight:bold;
}

</style>
<script type="text/javascript">$("#estrellas").children('a').attr("class",null);</script>
<!-- Container fluid -->
<div class="container-fluid">
	<br/>
	<h1 class="titulo text-secondary">Recursos</h1>
	<div class="row">
		<div class="col-md-3">
		<div class="box box-success col-md-10">
			<br/>
				<!-- Search Widget -->
			<div class="card md-4">
				<h4 class="card-header text-center">Buscar</h4>
				<div class="card-body">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Buscar por ...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div> <!-- Cierra input-group -->
					</div> <!-- Cierra card-body -->
					<br/>
					<!-- Categories Widget -->
					<div class="card my-3">
						<h4 class="card-header text-center">Categoria</h4>
						<div class="card-body">
							<div class="row">
							<div class="col-md-12">
								<select class="form-control text-center" id="categoria" name="categoria">
									<option value="" selected>Elija una opcion</option>
									<?php 
										foreach ($categoria as $unCat) {
    								?>
									<option value="<?php echo $unCat["nombre"]; ?>"><?php echo $unCat["nombre"];
									}?>
									</option>
								</select>
								</div>
							</div> <!-- cierra la clase row -->
						</div> <!-- cierra el card-body -->
					</div> <!-- cierra el card my-4 -->
					<!-- Side Widget -->
					<br/>
					<div class="card my-3">
						<h4 class="card-header text-center">Tema</h4>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
								<select class="form-control text-center" id="tema" name="tema" onchange="actualizarTema();">
									<option value="" selected>Elija una opcion
										<?php 
											foreach ($temas as $unTema) {
    									?>
									<option value="<?php echo $unTema["nombre"]; ?>"><?php echo $unTema["nombre"];
										}?>
									</option>
								</select>
								</div>
							</div>
						</div>
					</div>
					<br/>
					<div class="card my-3">
						<h4 class="card-header text-center">Año de Enseñanza</h4>
						<div class="card-body">
							<div class="row">
								<div class="col-md-offset-3 col-md-6">
									<ul class="list-unstyled mb-0 text-center">
										<?php
                                     		foreach ($niveles as $unNivel) {
                                        ?>
										<li><input type="checkbox" id="<?php echo $unNivel["nombre"]; ?>"
											value="<?php echo $unNivel["nombre"]; ?>"><span>
											<?php echo $unNivel["nombre"]; ?></span>
										</li>
										<?php
                                     }?>
									</ul>
									<br/>
								</div> <!-- cierra el col -->
							</div> <!-- cierra el row -->
						</div> <!-- cierra el card body -->
					</div> <!-- cierra el card my-4 -->
				</div> <!-- Cierra card md-3 -->
			</div> <!-- cierra el col-md-3 -->
		</div>
		<div class="col-md-9">
			<?php
	        if (count($results)>0) {
    	        generarFilas($results, $links, 3);
    	    }
    	    ?>
			<?php
        	/**
         	* Esta funcion genera las filas de los recursos donde $porFila sera la cantidad a mostrar por filas
         	* $results es el array de recursos
         	*/
 			function generarFilas($results, $links, $porFila)
 			{
     		?>
			<section class="blog-area section">
				<?php $i=1;
     			foreach ($results as $data) {
        			if (count($results)==1) {//Solo tiene un elemento ?>
				<div class="row">
					<div class="col-md-<?php echo 12/$porFila?> area">
						<div class="card h-100">
							<div class="single-post post-style-1">
								<div class="blog-image"><img src="<?php echo base_url()."assets/estilo/"; ?>imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
								<a class="avatar" ><img src="<?php if($data->foto==""){echo base_url()."assets/upload/fotoPerfil/user-default.png";}else{echo base_url()."assets/upload/fotoPerfil/".$data->nombreUsuario."/".$data->foto;} ?>" alt="Profile Image"></a>
								<br/>
								<strong><?php echo "Autor: ".$data->nombreUsuario; ?></strong>
								<div class="blog-info">
									<h4 class="title"><a href="<?php echo "view/".$data->idRecurso; ?>"><b><?php echo $data->titulo; ?></b><span></span>
									<?php if($data->validado==1){
										echo '<i class="fa fa-check-circle-o"></i>';
									} ?></a></h4>
									<ul class="post-footer">
									<?php if($data->promedio>0){?>				
											<li class="starStatic"><a><?php for($i=0;$i<(int) $data->promedio;$i++){ echo "&#9733";  } ?></a></li><li><a href="<?php echo base_url();?>recurso/view/<?php echo $data->idRecurso;?>"><i class="ion-chatbubble"></i></a></li>
										<?php }else{
                                            ?><li class="starStaticWhite"><a><?php 
                                                echo "Sin valorizar";
                                             ?></a></li><li><a href="<?php echo base_url(); ?>recurso/view/<?php echo $data->idRecurso; ?>"><i class="ion-chatbubble"></i></a></li><?php
                                        }?>
									</ul>
								</div><!-- blog-info -->
							</div><!-- single-post -->
						</div><!-- card -->
					</div> <!-- cierrala clase area -->
				</div>
				<?php
        		} else {
					if ($i%$porFila==0 && $i!=1 && $i!=count($results)) {//Ultimo elemento de la fila
				?>
				<div class="col-md-<?php echo 12/$porFila?> area">
					<div class="card h-100">
						<div class="single-post post-style-1">
							<div class="blog-image"><img src="<?php echo base_url()."assets/estilo/"; ?>imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
								<a class="avatar" ><img src="<?php if($data->foto==""){echo base_url()."assets/upload/fotoPerfil/user-default.png";}else{echo base_url()."assets/upload/fotoPerfil/".$data->nombreUsuario."/".$data->foto;} ?>" alt="Profile Image"></a>
								<br/>
								<strong><?php echo "Autor:".$data->nombreUsuario; ?></strong>
								<div class="blog-info">
									<h4 class="title"><a href="<?php echo "view/".$data->idRecurso; ?>"><b><?php echo $data->titulo; ?></b><span></span>
									<?php if($data->validado==1){
										echo '<i class="fa fa-check-circle-o"></i>';
									} ?></a></h4>
									<ul class="post-footer">			
									<?php if($data->promedio>0){?>				
											<li class="starStatic"><a><?php for($i=0;$i<(int) $data->promedio;$i++){ echo "&#9733";  } ?></a></li><li><a href="<?php echo base_url();?>recurso/view/<?php echo $data->idRecurso;?>"><i class="ion-chatbubble"></i></a></li>
										<?php }else{
                                            ?><li class="starStaticWhite"><a><?php 
                                                echo "Sin valorizar";
                                             ?></a></li><li><a href="<?php echo base_url(); ?>recurso/view/<?php echo $data->idRecurso; ?>"><i class="ion-chatbubble"></i></a></li><?php
                                        }?>
									</ul>
								</div><!-- blog-info -->
							</div><!-- single-post -->
						</div><!-- card -->
					</div> <!-- cierrala clase area -->
				</div>
				<div class="row">
				<?php
        	    	} elseif ($i==1) {//Primer elemento
        		?>
				<div class="row">
					<div class="col-md-<?php echo 12/$porFila?> area">
						<div class="card h-100">
							<div class="single-post post-style-1">
								<div class="blog-image"><img src="<?php echo base_url()."assets/estilo/"; ?>imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
									<a class="avatar" ><img src="<?php if($data->foto==""){echo base_url()."assets/upload/fotoPerfil/user-default.png";}else{echo base_url()."assets/upload/fotoPerfil/".$data->nombreUsuario."/".$data->foto;} ?>" alt="Profile Image"></a>
									<br/>
									<strong><?php echo "Autor:".$data->nombreUsuario; ?></strong>
									<div class="blog-info">
										<h4 class="title"><a href="<?php echo "view/".$data->idRecurso; ?>"><b><?php echo $data->titulo; ?></b><span></span>
										<?php if($data->validado==1){
											echo '<i class="fa fa-check-circle-o"></i>';
										} ?></a></h4>
										<ul class="post-footer">
										<?php if($data->promedio>0){?>				
											<li class="starStatic"><a><?php for($i=0;$i<(int) $data->promedio;$i++){ echo "&#9733";  } ?></a></li><li><a href="<?php echo base_url();?>recurso/view/<?php echo $data->idRecurso;?>"><i class="ion-chatbubble"></i></a></li>
										<?php }else{
                                            ?><li class="starStaticWhite"><a><?php 
                                                echo "Sin valorizar";
                                             ?></a></li><li><a href="<?php echo base_url(); ?>recurso/view/<?php echo $data->idRecurso; ?>"><i class="ion-chatbubble"></i></a></li><?php
                                        }?>
										</ul>
									</div><!--cierra la clase blog-info -->
								</div><!--cierra la clase single-post -->
							</div><!--cierra la clase card -->
						</div> <!-- cierra la clase area -->
						<?php
            				} elseif ($i==count($results)) {//Ultimo elemento
            			?>
						<div class="col-md-<?php echo 12/$porFila?> area">
							<div class="card h-100">
								<div class="single-post post-style-1">
									<div class="blog-image"><img src="<?php echo base_url()."assets/estilo/"; ?>imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
										<a class="avatar" ><img src="<?php if($data->foto==""){echo base_url()."assets/upload/fotoPerfil/user-default.png";}else{echo base_url()."assets/upload/fotoPerfil/".$data->nombreUsuario."/".$data->foto;} ?>" alt="Profile Image"></a>
										<br/>
										<strong><?php echo "Autor:".$data->nombreUsuario; ?></strong>
										<div class="blog-info">
											<h4 class="title"><a href="<?php echo "view/".$data->idRecurso; ?>"><b><?php echo $data->titulo; ?></b><span></span>
												<?php if($data->validado==1){
												echo '<i class="fa fa-check-circle-o"></i>';
												} ?></a>
											</h4>
											<ul class="post-footer">
											<?php if($data->promedio>0){?>				
											<li class="starStatic"><a><?php for($i=0;$i<(int) $data->promedio;$i++){ echo "&#9733";  } ?></a></li><li><a href="<?php echo base_url();?>recurso/view/<?php echo $data->idRecurso;?>"><i class="ion-chatbubble"></i></a></li>
										<?php }else{
											?><li class="starStaticWhite"><a><?php 
											echo "Sin valorizar";
                                             ?></a></li><li><a href="<?php echo base_url(); ?>recurso/view/<?php echo $data->idRecurso; ?>"><i class="ion-chatbubble"></i></a></li><?php
                                        }?>
				
											</ul>
										</div><!--cierra la clase blog-info -->
									</div><!--cierra la clase single-post -->
								</div><!--cierra la clase card -->
							</div> <!-- cierra la clase area -->
						</div>
							<?php
            					} else {
            				?>
						<div class="col-md-<?php echo 12/$porFila?> area">
							<div class="card h-100">
								<div class="single-post post-style-1">
									<div class="blog-image"><img src="<?php echo base_url()."assets/estilo/"; ?>imagenes/marion-michele-330691.jpg" alt="Blog Image"></div>
										<a class="avatar" ><img src="<?php if($data->foto==""){echo base_url()."assets/upload/fotoPerfil/user-default.png";}else{echo base_url()."assets/upload/fotoPerfil/".$data->nombreUsuario."/".$data->foto;} ?>" alt="Profile Image"></a>
										<br/>
										<strong><?php echo "Autor:".$data->nombreUsuario; ?></strong>
										<div class="blog-info">
											<h4 class="title"><a href="<?php echo "view/".$data->idRecurso; ?>"><b><?php echo $data->titulo; ?></b><span></span>
											<?php if($data->validado==1){
												echo '<i class="fa fa-check-circle-o"></i>';
											} ?></a></h4>
											<ul class="post-footer">
											<?php if($data->promedio>0){?>				
											<li class="starStatic"><a><?php for($i=0;$i<(int) $data->promedio;$i++){ echo "&#9733";  } ?></a></li><li><a href="<?php echo base_url();?>recurso/view/<?php echo $data->idRecurso;?>"><i class="ion-chatbubble"></i></a></li>
										<?php }else{
                                            ?><li class="starStaticWhite"><a><?php
                                                echo "Sin valorizar";
                                            ?></a></li><li><a href="<?php echo base_url(); ?>recurso/view/<?php echo $data->idRecurso; ?>"><i class="ion-chatbubble"></i></a></li><?php
                                        }?>
											</ul>
										</div><!--cierra la clase blog-info -->
									</div><!--cierra la clase single-post -->
								</div><!--cierra la clase card -->
							</div> <!-- cierra la clase area --> 
							<?php
             					}
             					$i++;
         						}//Fin else
	 						}//Fin foreach
	 						?>
							<div class="row">
	 							<div class="offset-md-5"><?php echo $links; ?>
	 						</div>
 						</div>	
						<?php
 							}//Fin funcion
 						?> <!--div container -->
			</section>
		</div><!--col-md-9 -->
	</div><!--div row -->
</div><!--div container-fluid -->
