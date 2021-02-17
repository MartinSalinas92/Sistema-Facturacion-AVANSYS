
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
                <th>id </th> 
                <th>Nombre</th> 
                <th>Usuario</th> 
                <th>Password </th> 
                <th>Estado </th> 
                <th>Perfil </th> 
                <th>Foto </th> 
                <th>Ultimo_login </th> 
                <th>Fecha </th> 
                <th>Fecha_entrada </th> 
                <th>Fecha_Salida </th> 
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
              <tr>
                <td>1</td>
                <td>Ramiro</td>
                <td>admin</td>
                <td>admin123</td>
                <td><button class="btn btn-success btn-xs">Activado </button></td>
                <td>Administrar</td>
                <td>
                <img src="vistas/img/usuarios/user-silhouette.png" class="user-image"></td>
                <td>0000-00-00 </td>
                <td>2019-09-20 </td>
                <td>2019-09-13 21:19:49 </td>
                <td>2019-09-13 21:19:49 </td>
                <td> 
                <div class="btn-group">
                
                  <button class="btn btn-warning"><i class="fa fa-pencil"></i> </button>
                
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                </div>
                
                
                </td>
                
              
              
              
              
              </tr>
            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>
    
  </div>


  
  <!--======================================================
        MODAL USUARIOS
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
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" requiered>
            </div>
          </div> 
        <!--ENTRADA PARA EL USUARIO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-key"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" requiered>
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
              <input type="file" id="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso maximo de la 200 MB</p>
                <img src="vistas/img/usuarios/user-silhouette.png" class="img-thumbnail" width="100px">
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Usuarios </button>
      <div>
      </form>
       
        </div> 
      </div>
  
        
          
        
      
      </div>
      
    </div>
  </div>
</div>