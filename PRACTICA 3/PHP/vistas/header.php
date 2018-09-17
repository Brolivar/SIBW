<!-- Contenido de la zona de cabecera -->
<header>
    <!-- Título de la portada -->
    <h1>Museo Arqueológico Subacuático</h1>
    <!-- Logotipo del museo -->
    <img class="logotipo" src="../Imagenes/logotipo.png" alt="Logotipo" >
    <!-- Menú de navegación -->
  
    <nav id="menusup">  

        <?php
            //GENERACION DE MENU DINAMICO, iteramos por los componentes con sus nombres y las urls a las que redirigen
            require("controladores/controlador_InfoGeneral.php");

            for ($i=0; $i < count($nombresMenus); $i++) {
                echo '<a href="' .$urlMenus[$i]. '">' .$nombresMenus[$i]. '</a>';
            }
        ?>
        
    </nav>
</header>