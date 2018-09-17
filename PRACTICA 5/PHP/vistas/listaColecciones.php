
<?php 
	// CODIGO PARA MOSTRAR LISTA DE COLECCIONES 
	for($i=0; $i < count($nombres_final); $i++)
	{
		?> <div class="bloque_colecciones"> <?php

		?>	<h3 id="titulo_coleccion"><?php echo '<a href="?coleccion=' .$nombres_final[$i]. '">' .$nombres_final[$i]. '</a>' ?> </h3>
<?php } 

	