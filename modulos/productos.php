
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos

      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    

      <!-- Default box -->
      <div class="box">
      <div class="row">
    <?php
    include 'inicio/actualizar_precios.php';
     ?>
    </div>
        <div class="box-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#AgregarProducto">
          
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            
          
          </button>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                
                <th>Imagen</th> 
                <th>descripcion</th>  
                <th>precio_venta</th> 
                <th>precio_compra</th>
                <th>stock_min</th>
                <th>stock</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Subategoria</th>
                <th>Estado</th>
                <th>Acciones</th>
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 

            <?php 
            $item= null;
            $valor= null;

            $productos=ControladorProductos::ctrMostrarProductos($item,$valor);
            //var_dump($productos);

            foreach($productos as $values){
              
              echo'
              <tr>

              <td>';
           
            
              if($values['imagen'] !=''){
                echo '<img src="'.$values['imagen'].'" class="img-fluid img-thumbnail" width=40px> ';
            }else{
              echo ' <img src="vistas/img/productos/anonymous.png" class="img-fluid img-thumbnail" width=30px> </td>';
            }
            echo '
         
                <td>'.$values['descripcion'].'</td>
                <td>'.number_format($values['precio_venta'],2).'</td>
                <td>'.number_format($values['precio_compra'],2).'</td>';

                echo'
                <td> <span class="btn btn-danger" idProducto="'.$values['id_producto'].'">'.$values['stock_min'].'</span></td>
                
                ';

                if($values['stock'] <= $values['stock_min']){
                  echo '<td><span class="btn btn-danger" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td>';
                }else if($values['stock'] <= 5 ){
                  echo '<td><span  class="btn btn-warning" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td> ';
                  
                }else{
                  echo '<td><span class="btn btn-success" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td>';
                }
                echo'

                
                <td>'.$values['nombre_marca'].'</td>
                <td>'.$values['nombre_categoria'].'</td>
                <td>'.$values['nombre_subcategoria'].'</td>';

                

                if($values['estado'] !=0){
                  echo '<td><button type="button" class="btn btn-success btn-xs btnActivarProducto" idProductos="'.$values['id_producto'].'" estadoProductos="0">Activado</button></td>';
              }else{
                echo '<td><button type="button" class="btn btn-danger btn-xs btnActivarProducto" idProductos="'.$values['id_producto'].'" estadoProductos="1">Desactivado</button></td>';
              }
                
                echo'
               
                <td> 
                <div class="btn-group">
                  <button class="btn btn-warning btn-EditarProductos" data-toggle="modal" data-target="#editarProductos" idProductoss="'.$values['id_producto'].'" onclick="editp('.$values['id_producto'].');"><i class="fa fa-pencil"></i> </button>';


                  if($values['estado'] !=0){
                    echo ' <button class="btn btn-success btnEliminarProducto" idProducto="'.$values['id_producto'].'"><i class="fa fa-check" estadoProductos="1"></i> </button>
                    </div>';
                    }else{
                    echo '<button class="btn btn-danger btnEliminarProducto" idProducto="'.$values['id_producto'].'"><i class="fa fa-times" estadoProductos="0"></i> </button>
                    </div>';
                    }'
                
                
                
                
                
              
              
              
              
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
        MODAL AGREGAR PRODUCTOS
  =========================================================-->
  
  <div class="modal fade" id="AgregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
  <!--======================================================
        CUERPO DEL MODAL
  =========================================================-->
      <div class="modal-body">
        <div class="box-body">
        
       
        
        <!--ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-product-hunt"> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevaDescripcion" required>
            </div>
          </div>
         
        <!--ENTRADA PARA EL CODIGO DEL PRODUCTO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-barcode"> </i> </span>
                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" required>
            </div>
          </div>
         
       

          <!--ENTRADA PARA EL PRECIO DE COMPRA-->
          <div class="form-group row">
            <div class="col-xs-12 col-sm-6"> 

              <div class="input-group"> 
                <span class="input-group-addon"><i class="fa fa-arrow-up"> </i> </span>
                  <input type="number" class="form-control input-lg" id="nuevaPrecioCompra" name="nuevaPrecioCompra" min="0" step="any" placeholder="precio de compra"required>
              </div>
            
            </div>
          
          
          <!--ENTRADA PARA EL PRECIO DE VENTA-->
          <div class="col-xs-12 col-sm-6">
           
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-arrow-down"> </i> </span>
                <input type="number" class="form-control input-lg" id="nuevaPrecioVenta" name="nuevaPrecioVenta" min="0" step="any" placeholder="precio de venta"required>
            </div>
            <br>
            <!--checkbox para porcentaje-->
            <div class="col-xs-6" >
              <div class="form-group"> 
                <label> 

                <input type="checkbox" class="minimal porcentaje" checked>

                Utilizar porcentaje
                
                
                </label>

                </div>

              
              </div>
              <!--entrada para porcentaje-->
              <div class="col-xs-6" style="padding: 0">
                <div class="input-group">

                  <input type="number" class="form-control input-lg nuevoPorcentaje"  min="0" value="40" required>

                  <span class="input-group-addon"><i class="fa fa-percent"> </i> </span>
                
                
                </div> 
              
              
              </div>
          </div>
        </div>

          
        <!--ENTRADA PARA EL STOCK -->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-check"> </i> </span>
                <input type="number" class="form-control input-lg" name="nuevaStock" min="0" placeholder="stock" required>
            </div>
          </div>
        <!--ENTRADA PARA EL STOCK_MIN -->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-check"> </i> </span>
                <input type="number" class="form-control input-lg" name="nuevaStock_min" min="0" placeholder="stock_min" required>
            </div>
          </div>
          <!--ENTRADA PARA SELECCIONAR LA MARCA-->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-meetup"> </i> </span>
                <select class="form-control input-lg" name="nuevoMarca">
                  <option value="">Seleccionar Marca</option>

                  <?php 
                  $item=null;
                  $valor=null;

                  $respuesta= ControladorMarcas::crtmostrarMarcas($item,$valor);

                  foreach($respuesta as $value){
                    if($value['estado'] != 0){

                      echo '<option value= '.$value['id_marca'].'>'.$value['nombre'].'</option>';
                      
                    }
                    
                  }
                  
                  
                  
                  ?>
                   
                </select>
            </div>
          </div> 

           <!--ENTRADA PARA SELECCIONAR LA CATEGORIA-->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>
                <select class="form-control input-lg" id="nuevoCategoria" name="nuevoCategoria">
                <option value="">Seleccionar Categoria</option>
                  
                  
                <?php 
                $item= null;
                $valor= null;

                $respuesta=ControladorCategorias::mostrarCategorias($item,$valor);
                
                foreach($respuesta as $values){
                  if($values['estado'] != 0){

                  echo'<option value='.$values['id_categoria'].'>'.$values['nombre'].'</option>';
                }
              }
                
                
                ?>
         
                </select>
            </div>
          </div> 
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>
                <select class="form-control input-lg" id="nuevoSubCategoria" name="nuevoSubCategoria">
                <option value="">Seleccionar Subcategoria</option>
                  
                  
                <?php 
                $item= null;
                $valor= null;

                $respuesta=SubcategoriaControlador::mostrarSubCategorias($item,$valor);
                
                foreach($respuesta as $values){
                  

                  echo'<option value='.$values['id_subcategoria'].'>'.$values['nombre'].'</option>';
                
              }
                
                
                ?>
         
                </select>
            </div>
          </div> 
           

          
            <!--ENTRADA PARA SUBIR FOTOS-->
            <div class="form-group"> 
            <div class="panel"> SUBIR IMAGEN</div>
              <input type="file" class="newImagen" name="nuevaImagen">
                <p class="help-block">Peso maximo de la 200 MB</p>
                <img src="vistas/img/productos/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            </div>
            </div>
           
         
         
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Productos </button>
      <div>

      <?php 
        $crearProductos= new ControladorProductos();
        $crearProductos->ctrCrearProductos();
      
      ?>
      </form>
       
                </div> 

            </div>
  
        </div>

      </div>

    </div>

  </div>

</div>
</div>


    <!--======================================================
        MODAL EDITAR PRODUCTOS
  =========================================================-->
  
  <div class="modal fade" id="editarProductos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Editar Productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
  <!--======================================================
        CUERPO DEL MODAL
  =========================================================-->
      <div class="modal-body">
        <div class="box-body">
        
      
        
        <!--ENTRADA PARA LA DESCRIPCION DEL PRODUCTO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-product-hunt"> </i> </span>
                <input type="hidden"  id="idProductos" name="idProductos" value="" required>
                <input type="text" class="form-control input-lg" id="EditarDescripcion" name="EditarDescripcion" required>
            </div>
          </div>
         
        <!--ENTRADA PARA EL CODIGO DEL PRODUCTO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-barcode"> </i> </span>
                <input type="text" class="form-control input-lg" id="EditarCodigo" name="EditarCodigo" readonly required>
            </div>
          </div>
         
       

          <!--ENTRADA PARA EL PRECIO DE COMPRA-->
          <div class="form-group row">
            <div class="col-xs-12 col-sm-6"> 

              <div class="input-group"> 
                <span class="input-group-addon"><i class="fa fa-arrow-up"> </i> </span>
                  <input type="number" class="form-control input-lg" id="EditarPrecioCompra" onchange="precioVenta()" name="EditarPrecioCompra" min="0" required>
              </div>
            
            </div>

          
          
          <!--ENTRADA PARA EL PRECIO DE VENTA-->
          <div class="col-xs-12 col-sm-6">
           
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-arrow-down"> </i> </span>
                <input type="number" class="form-control input-lg" id="EditarPrecioVenta" name="EditarPrecioVenta" min="0" required>
            </div>
            <br>
            <!--checkbox para porcentaje-->
            <div class="col-xs-6" >
              <div class="form-group"> 
                <label> 

                <input type="checkbox" class="minimal porcentajess" checked>

                Utilizar porcentaje
                
                
                </label>

                </div>

              
              </div>
              <!--entrada para porcentaje-->
              <div class="col-xs-6" style="padding: 0">
                <div class="input-group">

                  <input type="number" class="form-control input-lg nuevoPorcentaje" id="porcentaje"  min="0" value="40" required>

                  <span class="input-group-addon"><i class="fa fa-percent"> </i> </span>
                
                
                </div> 
              
              
              </div>
          </div>
        </div>

          
        <!--ENTRADA PARA EL STOCK -->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-check"> </i> </span>
                <input type="number" class="form-control input-lg"id="editarStock" name="editarStock" min="0"  required>
            </div>
          </div>
          <!--ENTRADA PARA SELECCIONAR LA MARCA-->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-meetup"> </i> </span>
                <select class="form-control input-lg" name="EditarMarca" id="idMarca">
                <?php 
                  $item=null;
                  $valor=null;

                  $respuesta= ControladorMarcas::crtmostrarMarcas($item,$valor);

                  foreach($respuesta as $value){

                    if($value['estado'] != 0)
                    echo '<option value= '.$value['id_marca'].'>'.$value['nombre'].'</option>';
                  }
                  ?>

                   
                </select>
            </div>
          </div> 

           <!--ENTRADA PARA SELECCIONAR LA CATEGORIA-->
        <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>
                <select class="form-control input-lg"  name="EditarCategoria" id="idCategoria">
                <option id="idCategoria"></option>

                <?php 
                $item= null;
                $valor= null;

                $respuesta=ControladorCategorias::mostrarCategorias($item,$valor);
                foreach($respuesta as $values){

                  if($values['estado'] != 0){

                    echo'<option value='.$values['id_categoria'].'>'.$values['nombre'].'</option>';

                  }

                  
                  
                }
                
                
                ?>
                  
              
         
                </select>
            </div>
          </div> 
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao"> </i> </span>
                <select class="form-control input-lg" id="editarSubCategoria" name="editarSubCategoria">
                <option value="">Seleccionar Subcategoria</option>
                  
                  
                <?php 
                $item= null;
                $valor= null;

                $respuesta=SubcategoriaControlador::mostrarSubCategorias($item,$valor);
                
                foreach($respuesta as $values){
                  

                  echo'<option value='.$values['id_subcategoria'].'>'.$values['nombre'].'</option>';
                
              }
                
                
                ?>
         
                </select>
            </div>
          </div> 

          
            <!--ENTRADA PARA SUBIR FOTOS-->
            <div class="form-group"> 
            <div class="panel"> SUBIR IMAGEN</div>
              <input type="file" class="newImagen" name="editarImagen">
                <p class="help-block">Peso maximo de la 200 MB</p>
                <img src="vistas/img/productos/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" class="fotoActual" name="fotoActual" id="fotoActual" value="">
              </div>
              </div>
           
         
         
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Modificar Productos </button>

      </div>
      <?php 
      $editarProductos= new ControladorProductos();
      $editarProductos->ctrEditarProductos();
      
      ?>

      </form>

       
                </div> 
                
  

            </div>
  
        </div>

      </div>

    </div>

  </div>

</div>
</div>

    
 



