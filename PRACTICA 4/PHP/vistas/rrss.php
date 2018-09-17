<!-- Botones de redes sociales tales como twitter, facebook, instagram, además del botón para imprimir la
    descripción de la obra -->
<div class="social">

	<img src="../Imagenes/twitter.jpg" onclick="enviarMensajeTwitter('<?php echo $nombre_obra ?>','<?php echo $imagen_obra ?>')">
	<img src="../Imagenes/facebook.png" onclick="enviarMensajeFacebook('<?php echo $nombre_obra ?>','<?php echo $imagen_obra ?>')">
	<img src="../Imagenes/instagram.jpg" onclick="enviarMensajeInstagram('<?php echo $nombre_obra ?>','<?php echo $imagen_obra ?>')">

    <a href="javascript:window.print()" target="_blank"><img src="../Imagenes/print.jpg"></a>


	<!-- FUNCIONES JAVASCRIPT -->
	<script src="../JavaScript/funciones.js"></script>

</div> 