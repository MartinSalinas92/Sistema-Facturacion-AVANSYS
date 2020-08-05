
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Marcas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Marcas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarMarca">
          
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            
          
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th>Codigo</th> 
                <th>Nombre</th> 
                <th>Estado</th> 
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            <?php
              $item=null;
              $valor=null;

              $marcas=ControladorMarcas::crtmostrarMarcas($item,$valor);
              //var_dump($marcas);
              foreach($marcas as $values){
                echo '  <tr>
                <td>'.$values['id_marca'].'</td>
                <td>'.$values['nombre'].'</td>';

                if($values['estado']!=0){

               
                echo '<td><button type="button" id="estadoM" class="btn btn-success btn-xs btnActivar" idMarca="'.$values['id_marca'].'" estadoMarca="1">Activado</button></td>';
              }else{
                echo '<td><button type="button" id="estadoM" class="btn btn-danger btn-xs btnActivar" idMarca="'.$values['id_marca'].'" estadoMarca="0">Desactivado</button></td>';
              }
              echo '

                <td> 
                <div class="btn-group">
                <button class="btn btn-warning btnEditarMarca" idMarca="'.$values['id_marca'].'" data-toggle="modal" data-target="#EditarMarca"><i class="fa fa-pencil"></i> </button>';

                if($values['estado'] !=0){
                  echo ' <button class="btn btn-success btnEliminarMarca" idMarca="'.$values['id_marca'].'"><i class="fa fa-check" estadoMarca="1"></i> </button>
                  </div>';
                }else{
                  echo '  <button class="btn btn-danger btnEliminarMarca" idMarca="'.$values['id_marca'].'"><i class="fa fa-times" estadoMarca="0"></i> </button>
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
        MODAL AGREGAR  MARCA
  =========================================================-->
  
  
  <div class="modal fade" id="AgregarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
 
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Marcas</h5>
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
              <span class="input-group-addon"><i class="fa fa-meetup"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevaMarca" placeholder="Ingresar Marca" required>
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Marcas </button>
          </div>

            <?php 
              $crearMarca= new ControladorMarcas();
              $crearMarca->crearMarcas();
            
            ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>

        <!--======================================================
        EDITAR MARCA
  =========================================================-->

    <div class="modal fade" id="EditarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
 
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Editar Marcas</h5>
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
              <span class="input-group-addon"><i class="fa fa-meetup"> </i> </span>

              <input type="hidden"  id="idMarca" name="idMarca" value="" required>
                
                <input type="text" class="form-control input-lg" id="editarMarca" name="editarMarca" value="" required>
            
                
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Modificar Marca </button>
          </div>

<?php 
              $EditarMarca= new ControladorMarcas();
              $EditarMarca->ctrEditarMarca();
            
            ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>
  
    
   
    

 