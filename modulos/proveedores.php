<!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Proveedores
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Proveedores</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarProveedor">
          
            <i class="fa fa-user-plus" aria-hidden="true"></i>
            
          
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th>id </th> 
                <th>Razon_social</th> 
                <th>estado</th> 
                
              
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
              <?php
              $item=null;
              $valor=null;  

              $proveedores=ControladorProveedores::crtMostrarProveedores($item,$valor);

              /*var_dump($proveedores);*/

              

             foreach($proveedores as $value){
                echo '
                    <tr>
                    
                      <td>'.$value['id_proveedor'].' </td> 
                      <td>'.$value['razon_social'].'</td>';
                   
                      

                      if($value['estado'] !=0){
                          echo '<td><button type="button" class="btn btn-success btn-xs btnActivar" idProveedores="'.$value['id_proveedor'].'" estadoProveedor="0">Activado</button></td>';
                      }else{
                        echo '<td><button type="button" class="btn btn-danger btn-xs btnActivar" idProveedores="'.$value['id_proveedor'].'" estadoProveedor="1">Desactivado</button></td>';
                      }
                      
                      
                     
                     echo '

                  <td> 
                    <div class="btn-group">
                    <button class="btn btn-warning btnEditarProveedores" idProveedores="'.$value['id_proveedor'].'" data-toggle="modal" data-target="#EditarProveedor"><i class="fa fa-pencil"></i> </button>';

                    if($value['estado'] !=0){
                      echo ' <button class="btn btn-success btnEliminarProveedor" idProveedor="'.$value['id_proveedor'].'"><i class="fa fa-check" estadoProveedor="1"></i> </button>
                      </div>';
                      }else{
                      echo '  <button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value['id_proveedor'].'"><i class="fa fa-times" estadoProveedor="0"></i> </button>
                      </div>';
                      }'
             
            
                
              
              
              
              
              
                    

                  
                
                
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
        MODAL AGREGAR  PROVEEDOR
  =========================================================-->
  
  <div class="modal fade" id="AgregarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Proveedores</h5>
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
                <input type="text" class="form-control input-lg" name="nuevaRazonSocial"  required>
            </div>
          </div>
         
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Proveedores </button>
      <div>

      <?php 
        $crearProveedores= new ControladorProveedores();
        $crearProveedores->ctrCrearProveedores();
      
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
        MODAL EDITAR  PROVEEDOR
  =========================================================-->
  
  
  <div class="modal fade" id="EditarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
 
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Editar Proveedores</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
  <!--======================================================
        CUERPO DEL MODAL
  =========================================================-->
  
      <div class="modal-body">
        <div class="box-body">
        <!--ENTRADA PARA la razon social-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>

              <input type="hidden"  id="idProveedores" name="idProveedores" value="" required>
                
                <input type="text" class="form-control input-lg" id="editarRazonSocial" name="editarRazonSocial" value="" required>
            
                
            </div>
          </div> 
       
          
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Modificar Proveedores </button>
          </div>

        <?php 
              $EditarProveedores= new ControladorProveedores();
              $EditarProveedores->ctrEditarProveedores();
            
            ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>
  
  
        




   

   
    