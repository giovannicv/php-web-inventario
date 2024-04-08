<?php
//../php/main.php tambien sierve main.php  ../php/
    require_once "../php/main.php";

//almacenado datos de tabla usuario,nombre,apellido,usuario,email,clave//
    $nombre=limpiar_cadena($_POST['usuario_nombre']);
    $apellido=limpiar_cadena($_POST['usuario_apellido']);

    $usuario=limpiar_cadena($_POST['usuario_usuario']);
    $email=limpiar_cadena($_POST['usuario_email']);

    $clave_1=limpiar_cadena($_POST['usuario_clave_1']);
    $clave_2=limpiar_cadena($_POST['usuario_clave_2']);

//verificando campos obligatorios
    if($nombre=="" || $apellido=="" || $usuario=="" || $clave_1=="" ||
    $clave_2==""){
        //mensaje de error campos no llenados
        echo '
        <div class="notification is-danger is-light">
            <strong>ocurrio un error inesperado!</strong><br>
            no has llenado todos los campos que son obligatorios
        </div>
        ';
        exit();
    }
//INTEGRIDAD DE LOS DATOS
//verificando integridad de los datos para el NOMBRE
if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
    echo '
        <div class="notification is-danger is-light">
                    <strong>ocurrio un error inesperado!</strong><br>
                    EL NOMBRE no coincide con el formato solicitado
        </div>
    ';
    exit();
}
//verificando integridad de los datos para el APELLIDO
if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
    echo '
        <div class="notification is-danger is-light">
                    <strong>ocurrio un error inesperado!</strong><br>
                    EL APELLIDO no coincide con el formato solicitado
        </div>
        ';
        exit();
    }
//verificando integridad de los datos para el USUARIO
if(verificar_datos("[a-zA-Z0-9]{4,20}",$usuario)){
    echo '
        <div class="notification is-danger is-light">
                    <strong>ocurrio un error inesperado!</strong><br>
                    EL USUARIO no coincide con el formato solicitado
        </div>
        ';
        exit();
    }
//verificando integridad de los datos para el CLAVES
if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_2)){
    echo '
        <div class="notification is-danger is-light">
                    <strong>ocurrio un error inesperado!</strong><br>
                    LAS CLAVES no coincide con el formato solicitado
        </div>
    ';
    exit();
    }
//verificando el email o correo electronico
if($email!=""){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $check_email=conexion();
        $check_email=$check_email->query("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");
        if($check_email->rowCount()>0){
            echo '
                <div class="notification is-danger is-light">
                    <strong>ocurrio un error inesperado!</strong><br>
                    EL EMAIL ingresado ya se encuentra registrado, por favor elija otro
                </div>
            ';
        exit();
        }
        $check_email=null;
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>ocurrio un error inesperado!</strong><br>
                EL EMAIL ingresado no es valido
            </div>
        ';
        exit();
    }
}
//verificando el USUARIO
$check_usuario=conexion();
$check_usuario=$check_usuario->query("SELECT usuario_usuario FROM usuario WHERE usuario_usuario='$usuario'");
    if($check_usuario->rowCount()>0){
        echo '
            <div class="notification is-danger is-light">
            <strong>ocurrio un error inesperado!</strong><br>
            EL USUARIO ingresado ya se encuentra registrado, elija otro usuario
            </div>
        ';
    exit();   
    }
$check_usuario=null;
//verificando la CLAVE
if($clave_1!=$clave_2){
    echo '
        <div class="notification is-danger is-light">
            <strong>ocurrio un error inesperado!</strong><br>
            LAS CLAVES que ha ingreso no coinciden
        </div>
    ';
    exit();
}else{
//para encriptar las claves PASSWORD_BCRYPT
    $clave=password_hash($clave_1,PASSWORD_BCRYPT,["cost"=>10]);
}

//PARA GUARDAR LOS DATOS EN LA BASE DE DATOS
$guardar_usuario=conexion();
$guardar_usuario=$guardar_usuario->query("INSERT INTO usuario(usuario_nombre,usuario_apellido,usuario_usuario,usuario_clave,usuario_email) VALUES('$nombre','$apellido','$usuario','$clave','$email',)
");