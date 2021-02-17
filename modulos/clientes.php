<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Clientes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarClientes">

          <i class="fa fa-user-plus" aria-hidden="true"></i>
            
          
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr> 
                <th>Nombre</th> 
                <th>Apellido</th> 
                <th>DNI</th> 
                <th>Localidad</th> 
                <th>direccion</th> 
                <th>Nombre_Calle</th> 
                <th>Numero_Calle</th> 
                <th>Numero_Casa</th> 
                <th>Piso o Departamento</th> 
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 

            <?php 

            $item= null;
            $valor= null;

            $respuesta= ControladorClientes::ctrMostrarClientes($item,$valor);

            /*var_dump($respuesta);*/

            foreach($respuesta as $values){

              echo '
            <tr>
                <td>'.$values['nombre'].'</td>
                <td>'.$values['apellido'].'</td>
                <td>'.$values['dni'].'</td>
                <td>'.$values['localidad'].'</td>
                <td>'.$values['direccion'].'</td>
                <td>'.$values['nombre_calle'].'</td>
                <td>'.$values['numero_calle'].'</td>';

                if($values['numero_casa'] != ''){
                  echo ' <td>'.$values['numero_casa'].'</td>';
                }else{
                  echo '<td> <button class="btn btn-success">
                  <i class="fa fa-ban" aria-hidden="true"></i> </button>';
                }

              if($values['piso_departamento'] !=''){
                echo' <td>'.$values['piso_departamento'].'</td>';
              }else{

                echo '<td> <button class="btn btn-success">
                  <i class="fa fa-ban" aria-hidden="true"></i> </button>';

              }

               
               
               echo '
                <td> 
                <div class="btn-group">
                  <button class="btn btn-warning btnEditarClientes"  onclick="editar('.$values['id_persona'].')" data-toggle="modal" data-target="#editarClientes"><i class="fa fa-pencil"></i> </button>
                  
                  <button class="btn btn-danger"><i class="fa fa-times"></i> </button>
                
                  
                </div>
                </td>
              </tr>
            
            ';

            }

            
            
            
            ?>
              
            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      </div>
      

    </section>

    
     <!--======================================================
        MODAL AGREGAR  clientes
  =========================================================-->
  
  <div class="modal fade" id="AgregarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Clientes</h5>
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
        <!--ENTRADA PARA EL APELLIDO -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL DNI -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoDNI" placeholder="35778898" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA LOCALIDAD -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaLocalidad" placeholder="Formosa Capital" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA DIRECCION -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="b illia2 mz49 " required>
            </div>
          </div> 
        <!--ENTRADA PARA LA calle -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-road" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaCalle" placeholder="arenales y mouchard">
            </div>
          </div> 
        <!--ENTRADA PARA EL NUMERO DE CALLE-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="numerodeCalle" >
            </div>
          </div> 
        
        <!--ENTRADA PARA EL NUMERO DE CASA-->
          <div class="form-group"> 
            <div class="input-group"> 
            
              <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="numerodeCasa" placeholder="numero de casa" >
            </div>
          </div> 
        <!--ENTRADA PARA EL DEPARTAMENTO O PISO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao""> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoDepartamento">
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Clientes </button>
      <div>

      <?php

        $crearClientes= new ControladorClientes;
        $crearClientes->ctrCrearClientes();

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
        MODAL EDITAR EDITAR
  =========================================================-->
  
  <div class="modal fade" id="editarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Editar Clientes</h5>
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
                <input type="hidden" id="idCliente" name="idCLiente" value="" required>
                <input type="text" class="form-control input-lg" id="editarNombre" name="EditarNombre" value="" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL APELLIDO -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" value="" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL DNI -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="editarDNI" name="EditarDNI" value="" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA LOCALIDAD -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i> </span>
              <input type="hidden" id="idDireccion" name="idDireccion" value="" required>
                <input type="text" class="form-control input-lg" id="EditarLocalidad" name="EditarLocalidad" value="" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA DIRECCION -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="EditarDireccion" name="EditarDireccion" value=""  required>
            </div>
          </div> 
        <!--ENTRADA PARA LA calle -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-road" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="editarCalle" name="EditarCalle"  value="" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL NUMERO DE CALLE-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="editarnumerodeCalle" name="editarnumerodeCalle" value="" >
            </div>
          </div> 
        
        <!--ENTRADA PARA EL NUMERO DE CASA-->
          <div class="form-group"> 
            <div class="input-group"> 
            
              <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" id="editarnumerodeCasa" name="editarnumerodeCasa" value="" >
            </div>
          </div> 
        <!--ENTRADA PARA EL DEPARTAMENTO O PISO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao""> </i> </span>
                <input type="text" class="form-control input-lg" id="editarNUevoDepartamento" name="EditarnuevoDepartamento" value="">
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Modificar Clientes </button>
      <div>
            <?php 
              $editar= new ControladorClientes();
              $editar->crtEditarClientes();
            
            ?>
  

    
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>

  </div>

</div>

   