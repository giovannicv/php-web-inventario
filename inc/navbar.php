<nav class="navbar" role="navigation" aria-label="main navigation">
  <!--logo en la esquina izquierda  -->
<div class="navbar-brand">
      <!--index.php?vista=home para que vaya directo a la pagina principal-->
    <a class="navbar-item" href="index.php?vista=home">
    <!--ruta del logo en png, dimesiones mas 50x100 -->
      <img src="./img/logopan.png" width="50" height="100">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
<!-- menu PARA LAS PESTAÑAS DE USUARIO,CATEGORIAS,PRODUCTOS -->
  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    <!-- barra de navegacion USUARIOS -->
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">USUARIOS</a>
                    <div class="navbar-dropdown">
                    <!-- href="index.php?vista=user_new sirve para ir a la pestaña usuario nuevo -->
                        <a class="navbar-item" href="index.php?vista=user_new"
                        >NUEVO</a>
                        <a class="navbar-item" href="index.php?vista=user_list"
                        >LISTA</a>
                        <a class="navbar-item" href="index.php?vista=user_search"
                        >BUSCAR</a>
                    </div>
                </div>
    <!--barra de navegacion CATEGORIAS -->
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">CATEGORIAS</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">NUEVO</a>
                        <a class="navbar-item">LISTA</a>
                        <a class="navbar-item">BUSCAR</a>
                    </div>
                </div>
    <!--barra de navegacion PRODUCTOS -->
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">PRODUCTOS</a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">NUEVO</a>
                        <a class="navbar-item">LISTA</a>
                        <a class="navbar-item">POR CATEGORIA</a>
                        <a class="navbar-item">BUSCAR</a>
                    </div>
                </div>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <!-- botones en la esquina derrecha MI CUENTA,SALIR -->
        <div class="buttons">
        <!-- boton esquina derrecha MI CUENTA color verde-->
          <a class="button is-success is-rounded">
            MI CUENTA
          </a>
        <!-- boton esquina derrecha SALIR color rojo-->
          <a class="button is-danger is-rounded">
            SALIR
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>