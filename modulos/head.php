<header class="main-header">

<!--======================================================
        LOGOTIPO
  =========================================================-->

  <a href="inicio" class="logo">

    <!--logo mini-->
    <span class='logo-mini'>

        <img src="vistas/img/plantilla/Hebreos.jpg"  class="img-responsive" style="padding:2px">

    </span>

    <!--logo Normal-->

    <span class='logo-lg'>

        <img src="vistas/img/plantilla/color_logo_white.jpg"  class="img-responsive" style="padding:10px 0px">

    </span>
</a>
    
<!--======================================================
        BARRA DE NAVEGACION
  =========================================================-->

  <nav class="navbar navbar-static-top" role="navigation"> 

  <!--boton de navegacion-->


        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">toggle navigation </span>
       
 



         </a>

<!--Perfil del usuario-->

<div class="navbar-custom-menu"> 
    <ul class="nav navbar-nav"> 
        <li class="dropdown user user-menu"> 
        
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <?php
                if($_SESSION["foto"] !=""){

                    echo'<img src="'.$_SESSION["foto"].'"class="user-image">';
                }else{
                    
               echo' <img src="vistas/img/usuarios/user-silhouette.png" class="user-image">';
                }

                ?>



                <span class="hidden-xs"> <?php echo $_SESSION["nombre"]; ?>  </span>
            </a>

                <ul class="dropdown-menu"> 
                    <li class="user-body">
                        <div class="pull-right">

                            <a href="salir" class="btn btn-default btn-flat"> SALIR</a>
    
                        </div>

                    </li>


                </ul>

        </li>

    </ul>

            
</div>

<!--Dropdow - toggle-->

    
    
    

   
  </nav>

</header>