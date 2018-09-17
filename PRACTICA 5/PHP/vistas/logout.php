<?php

	// Recupera la sesión abierta que hubiese
    session_start();
    // Elimina dicha sesión
    session_destroy();
    header("Location: ../index.php");
?>