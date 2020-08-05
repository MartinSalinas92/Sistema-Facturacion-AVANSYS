<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarUsuario">
          
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            
          
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th>Codigo</th> 
                <th>Nombre</th> 
                <th>Usuario</th> 
                <th>Estado </th> 
                <th>Perfil </th> 
                <th>Foto </th> 
                <th>Ultimo_login </th>  
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
              <?php
              $item=null;
              $valor=null;  

              $usuario=ControladorUsuarios::mostrarUsuarios($item,$valor);

              

             foreach($usuario as $value){
                echo '
                    <tr>
                    
                      <td>'.$value['id_usuario'].' </td> 
                      <td>'.$value['nombre'].'</td>
                      <td> '.$value['usuario'].'</td>';

                      if($value['estado'] !=0){
                          echo '<td><button type="button" class="btn btn-success btn-xs btnActivar" idUsuario="'.$value['id_usuario'].'" estadoUsuario="0">Activado</button></td>';
                      }else{
                        echo '<td><button type="button" class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value['id_usuario'].'" estadoUsuario="1">Desactivado</button></td>';
                      }
                      
                      
                     echo '<td> '.$value['perfil'].'<td>';

                      if($value['foto'] !=''){
                          echo '<img src="'.$value['foto'].'" class="img-fluid img-thumbnail" width=40px> ';
                      }else{
                        echo ' <img src="vistas/img/usuarios/user-silhouette.png" class="img-fluid img-thumbnail" width=30px>';
                      }
                      echo '
                      <td>'.$value['ultimo_login'].'</td> 
                      <td>
                      
                      <div class="btn-group">
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value['id_usuario'].'" data-toggle="modal" data-target="#EditarUsuario"><i class="fa fa-pencil"></i> </button>
                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value['id_usuario'].'" fotoUsuario="'.$value['foto'].'" usuario="'.$value['usuario'].'" ><i class="fa fa-times"></i> </button>
                    </div>
                    
                    </td>
                    
                    </tr>';
                 }

              
              
                
                
              
              ?>
            

            
            
            </tbody>
          
          
          </table>

        </div>

        </div>
        
       
      </div>
      

    </section>
    
  


  
  <!--======================================================
        MODAL AGREGAR  USUARIOS
  =========================================================-->
  
  <div class="modal fade" id="AgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Usuarios</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
  <!--======================================================
        CUERPO DEL MODAL
  =========================================================-->
      <div class="modal-body">
        <div class="box-body">
        <!--ENTRADA PARA EL NOMBRE-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-user"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL USUARIO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-key"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" id="nuevoUsuario"required>
            </div>
          </div> 
        
        <!--ENTRADA PARA EL Password-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-lock"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" requiered>
            </div>
          </div>
            <!--ENTRADA PARA SELECCIONAR EL PERFIL-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-users"> </i> </span>
                <select class="form-control input-lg" name="nuevoPerfil">
                  <option value="">Seleccionar Perfil</option>
                    <option value="administrador">Administrador</option>
                    <option value="vendedor">Vendedor</option>
                </select>
            </div>
          </div> 
            <!--ENTRADA PARA SUBIR FOTOS-->
          <div class="form-group"> 
            <div class="panel"> SUBIR FOTOS</div>
              <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso maximo de la 200 MB</p>
                <img src="vistas/img/usuarios/user-silhouette.png" class="img-thumbnail previsualizar" width="100px">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Usuarios </button>
      <div>

      <?php 
        $crearUsuario= new ControladorUsuarios();
        $crearUsuario->ctrCrearUsuario();
      
      ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>

  </div>

</div>


    

      


<!--======================================================
        MODAL EDITAR  USUARIOS
  =========================================================-->
      
      <div class="modal fade" id="EditarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
      <!--======================================================
            CABEZA DEL MODAL
      =========================================================-->
            <div class="modal-header" style="background:#ff851b; color:orange">
              <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Modificar Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
      <!--======================================================
            CUERPO DEL MODAL
      =========================================================-->
          <div class="modal-body">
            <div class="box-body">
            <!--ENTRADA PARA EL NOMBRE-->
              <div class="form-group"> 
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-user"> </i> </span>
                    <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                </div>
              </div> 
            <!--ENTRADA PARA EL USUARIO-->
              <div class="form-group"> 
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-key"> </i> </span>
                    <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                    <!--readonly sirve para no modificar este input-->
                </div>
              </div> 
            
            <!--ENTRADA PARA EL Password-->
              <div class="form-group"> 
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-lock"> </i> </span>
                    <input type="text" class="form-control input-lg" name="editarPassword" placeholder="escriba la nueva contraseña">
                    <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>
                <!--ENTRADA PARA SELECCIONAR EL PERFIL-->
              <div class="form-group"> 
                <div class="input-group"> 
                  <span class="input-group-addon"><i class="fa fa-users"> </i> </span>
                    <select class="form-control input-lg" name="editarPerfil">
                      <option value="" id="editarPerfil"></option>
                        <option value="administrador">Administrador</option>
                        <option value="vendedor">Vendedor</option>
                    </select>
                </div>
              </div> 
                <!--ENTRADA PARA SUBIR FOTOS-->
              <div class="form-group"> 
                <div class="panel"> SUBIR FOTOS</div>
                  <input type="file" class="nuevaFoto" name="editarFoto">
                    <p class="help-block">Peso maximo de la 200 MB</p>
                    <img src="vistas/img/usuarios/user-silhouette.png" class="img-thumbnail previsualizar" width="100px">
                    <input type="hidden" class="fotoActual" name="fotoActual" id="fotoActual">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                <button type="submit" class ="btn btn-primary"> Modificar Usuarios </button>
          <div>
    
          <?php 
            $EditarUsuario= new ControladorUsuarios();
            $EditarUsuario->ctrEditarUsuario();
          
          ?>
         

          </form>
          
          </div>

        </div>

       </div>

     </div>

    </div>

   </div>

     

  <?php 
           $EliminarUsuario= new ControladorUsuarios();
            $EliminarUsuario->BorrarUsuario();
  ?>

  

          
          



   


      
  