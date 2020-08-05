
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorias
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarCategoria">
          
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

              $categoria=ControladorCategorias::mostrarCategorias($item,$valor);

             /* var_dump($categoria);*/
             

              foreach($categoria as $value){
                echo '
                <tr> 
                    <td>'.$value['id_categoria'].' </td>
                    <td>'.$value['nombre'].' </td>';
                    
                    if($value['estado'] !=0){
                      echo '<td><button type="button" id="estadoC" class="btn btn-success btn-xs btnActivar" idCategoria="'.$value['id_categoria'].'" estadoCategoria="0">Activado</button></td>';
                  }else{
                    echo '<td><button type="button" id="estadoC" class="btn btn-danger btn-xs btnActivar" idCategoria="'.$value['id_categoria'].'" estadoCategoria="1">Desactivado</button></td>';
                  }
                  echo '

                    <td> 
                    <div class="btn-group">
                    <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value['id_categoria'].'" data-toggle="modal" data-target="#EditarCategoria"><i class="fa fa-pencil"></i> </button>';

                    if($value['estado'] !=0){
                      echo ' <button class="btn btn-success btnEliminarCategoria" idCategoria="'.$value['id_categoria'].'"><i class="fa fa-check" estadoCategoria="1"></i> </button>
                      </div>';
                    }else{
                      echo '  <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value['id_categoria'].'"><i class="fa fa-times" estadoCategoria="0"></i> </button>
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
        MODAL AGREGAR  CATEGORIA
  =========================================================-->
  
  
  <div class="modal fade" id="AgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
 
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Categorias</h5>
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
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar Categoria" required>
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Categorias </button>
          </div>

            <?php 
              $crearCategoria= new ControladorCategorias();
              $crearCategoria->ctrCrearCategoria();
            
            ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>
    
   
    

    
    
     <!--======================================================
        MODAL EDITAR  CATEGORIA
  =========================================================-->
  
  
  <div class="modal fade" id="EditarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
 
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Editar Categorias</h5>
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
              <span class="input-group-addon"><i class="fa fa-contao""> </i> </span>

              <input type="hidden"  id="idCategoria" name="idCategoria" value="" required>
                
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
            
                
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Modificar Categorias </button>
          </div>

<?php 
              $EditarCategoria= new ControladorCategorias();
              $EditarCategoria->ctrEditarCategoria();
            
            ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>
  
  
    

   
    
   <?php 
           $EliminarCategoria= new ControladorCategorias();
            $EliminarCategoria->BorrarCategorias();
  ?>
   

    

     

 
    

