
<!-- Encapsulamos todas las obras en una misma clase para aplicarles a todas el mismo estilo -->
<div class="bloque_obras">
    
	<?php 

		// Para mostrar las obras en la portada
		require("controladores/controlador_Obras.php");

		if (isset($listaObras)) {
			for ($i = 0; $i < count($listaObras); $i++) { 
				echo	"<div class='obras'> ";
				echo	"<a href='?obra=".$listaObras[$i]['ID']."'>" ;
				echo 	"<img src='../Imagenes/" .$listaObras[$i]['Imagen']. "'>";
				echo	"<div class='pie_foto'>" .$listaObras[$i]['Titulo']. "</div>";
				echo	"</a>";
				echo	"</div>";
			}
		}
		else
			echo "NO EXISTE LA VARIABLE $miniatura";
	?> 
</div>