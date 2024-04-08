<!-- <session es para ineciar secion antes de entrar a la pagina> -->
<?php require "./inc/session_star.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        //encabezado de la pagina que aparece en todas las paginas
        include "./inc/head.php";
    ?>
</head>
<body>
    <?php
    // para que logeen
        if(!isset($_GET['vista']) || $_GET['vista']==""){
            $_GET['vista']="login";
        }
        // si en valor coincide con la misma variable,muestra el valor ERROR 404
        if(is_file("./vistas/".$_GET['vista'].".php") && $_GET['vista']
        !="login" && $_GET['vista']!="404"){
        //BARRA DE NAVEGACION navbar
        include "./inc/navbar.php";
        
        include "./vistas/".$_GET['vista'].".php";
        // para mostra la vista de login
        //para que la barra de opciones sea responsible a celulares script
        include "./inc/script.php";
        }else{
            if($_GET['vista']=="login"){
                //vita de LOGIN
                include "./vistas/login.php";
            }else{
                //vista de error de LOGIN
                include "./vistas/404.php";
            }
        }
    ?>
    <!-- <img src="./img/logopan.png" width="100" height="100"> -->
</body>
</html>