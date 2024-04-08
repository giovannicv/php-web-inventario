<!-- para almacenar y conectarse a la base de datos INVENTARIO-->
<?php
// nombre de la base de datos dbname=inventario , para conectarse
//conexion a la base de datos
#conexion a la base de datos 
    function conexion(){
    $pdo = new PDO('mysql:host=localhost;dbname=inventario','root','');
    return $pdo;
}
# Verificar datos
function verificar_datos($filtro,$cadena){
    if(preg_match("/^".$filtro."$/",$cadena)){
        return false;
    }else{
        return true;
    }
}
# limpiar cadenas de texto
function limpiar_cadena($cadena){
    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);
    $cadena=str_ireplace("<script>","",$cadena);
    $cadena=str_ireplace("</script>","",$cadena);
    $cadena=str_ireplace("<script src", "",$cadena);
    $cadena=str_ireplace("<script type=", "",$cadena);
    $cadena=str_ireplace("SELECT * FROM", "",$cadena);
    $cadena=str_ireplace("DELETE FROM", "",$cadena);
    $cadena=str_ireplace("INSERT INTO", "",$cadena);
    $cadena=str_ireplace("DROP TABLE", "",$cadena);
    $cadena=str_ireplace("DROP DATABASE", "",$cadena);
    $cadena=str_ireplace("TRUNCATE TABLE", "",$cadena);
    $cadena=str_ireplace("SHOW TABLES;", "",$cadena);
    $cadena=str_ireplace("SHOW DATABASES;", "",$cadena);
    $cadena=str_ireplace("<?php", "",$cadena);
    $cadena=str_ireplace("?>", "",$cadena);
    $cadena=str_ireplace("--", "",$cadena);
    $cadena=str_ireplace("^", "",$cadena);
    $cadena=str_ireplace("<", "",$cadena);
    $cadena=str_ireplace("[", "",$cadena);
    $cadena=str_ireplace("]", "",$cadena);
    $cadena=str_ireplace("==", "",$cadena);
    $cadena=str_ireplace(";", "",$cadena);
    $cadena=str_ireplace("::", "",$cadena);
    $cadena=trim($cadena);
    $cadena=stripslashes($cadena);
    return $cadena;
}

# funcion renombra fotos
//function renombrar_fotos($nombre){
    //$nombre=str_ireplace(" ","_",$nombre);
    //$nombre=str_ireplace("/","_",$nombre);
    //$nombre=str_ireplace("#","_",$nombre);
    //$nombre=str_ireplace("-","_",$nombre);
    //$nombre=str_ireplace("$","_",$nombre);
    //$nombre=str_ireplace(".","_",$nombre);
    //$nombre=str_ireplace(",","_",$nombre);
    //$nombre=$nombre."_".rand(0,100);
    //return $nombre;
//}

# funcion paginador de paginas
function paginador_tablas($pagina,$Npaginas,$url,$botones){
    $tabla='<nav class="pagination is-centered is-rounded" role="navigation"
    aria-label="pagination">';

    if($pagina<=1){
        $tabla.='
        <a class="pagination-previous is-disabled" disabled>Anterior</a>
        <ul class="pagination-list">
        ';
    }else{
        $tabla.='
        <a class="pagination-previous" href="'.$url.($pagina-1).'">Anterior</a>
        <ul class="pagination-list">
            <li><a class="paginationn-link" href="'.$url.'1">1</a></li>
            <li><span class="paginationn-ellipsis">&hellip;</span></li>
        ';
    }
    $ci=0;
    for($i=$pagina; $i<=$Npaginas; $i++){
        if($ci>=$botones){
            break;
        }
        if($pagina==$i){
            $tabla.='<li><a class="paginationn-link is-current" href="'.$url.$i.'">'.$i.'</a></li>';
        }else{
            $tabla.='<li><a class="paginationn-link" href="'.$url.$i.'">'.
            $i.'</a></li>';
        }

        $ci++;
    }
//boton de siguiente
    if($pagina=$Npaginas){
        $tabla.='
        </ul>
        <a class="pagination-next is-dosabled" disabled >Siguiente</a>
        ';
    }else{
        $tabla.='
            <li><span class="paginationn-ellipsis">&hellip;</span></li>
            <li><a class="paginationn-link" href="'.$url.$Npaginas.'">'.
            $Npaginas.'</a></li>
        </ul>
        <a class="pagination-next" href="'.$url.($pagina+1).
        '">Siguiente</a>
        ';
    }
    $tabla='</nav>';
    return $tabla;
}
// arreglar en nombre de "categoria_uvicacion, categoria_ubicacion"
    //$pdo->query("INSERT INTO categoria(categoria_nombre,categoria_uvicacion)
    //VALUES('prueba','texto ubicacion')");