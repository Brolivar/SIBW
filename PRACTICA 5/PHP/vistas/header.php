<!-- Contenido de la zona de cabecera -->
<header>
    <!-- Título de la portada -->
    <h1>Museo Arqueológico Subacuático</h1>
    <!-- Logotipo del museo -->
    <img class="logotipo" src="../Imagenes/logotipo.png" alt="Logotipo" >
    <!-- Menú de navegación -->
  
    <nav id="menusup">  

        <?php
            // GENERACION DE MENU DINAMICO, iteramos por los componentes con sus nombres y las urls a las que redirigen
            require("controladores/controlador_InfoGeneral.php");

            for ($i=0; $i < count($nombresMenus); $i++) {

                // Filtramos la visualización de las opciones en función del rol del usuario identificado actualmente
                if (isset($_SESSION['rol'])) {

                    //El menu "Gestión de Obras" solo podrá ser visto por el Gestor y el Superuser
                    if($nombresMenus[$i] == "Gestionar Obras" && ( $_SESSION['rol'] == "gestor" || $_SESSION['rol'] == "superusuario" )){
                        echo '<a href="' .$urlMenus[$i]. '">' .$nombresMenus[$i]. '</a>';
                    }

                    //echo "Entra rol";
                    // No se mostrará la opción de gestionar los permisos a menos que sea un superusuario
                    else if ($nombresMenus[$i] == "Gestionar permisos" && $_SESSION['rol'] == "superusuario")
                        echo '<a href="' .$urlMenus[$i]. '">' .$nombresMenus[$i]. '</a>';
                    else if ($nombresMenus[$i] != "Gestionar permisos" && $nombresMenus[$i] != "Gestionar Obras") 
                        echo '<a href="' .$urlMenus[$i]. '">' .$nombresMenus[$i]. '</a>';
                }

                // Si no hay ningún usuario registrado solo se le muestran las opciones principales
                else {

                    // No se le muestra ni la opción de modificar sus datos ni la de gestionar permisos
                    if ($nombresMenus[$i] != "Modificar mis datos" && $nombresMenus[$i] != "Gestionar permisos" && $nombresMenus[$i] != "Gestionar Obras" )
                        echo '<a href="' .$urlMenus[$i]. '">' .$nombresMenus[$i]. '</a>';
                }
            }
        ?>
        
    </nav>
</header>