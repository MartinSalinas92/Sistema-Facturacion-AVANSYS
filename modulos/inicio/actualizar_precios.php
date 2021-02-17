<div class="content">
  <h3 class="center-center">ACTUALIZAR PRECIO DE PRODUCTOS </h3>  <br>




<div  class="col-lg-6 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-red">
    
    <div class="inner">
      
      <h3>ACTUALIZAR</h3>

      <p>POR CATEGORIA</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalActualizarPrecioCategoria">
      
      Actualizar <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>


<div  class="col-lg-6 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>ACTUALIZAR</h3>

      <p>POR Marca</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalActualizarPrecioSub">
      
      Actualizar <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

</div>

<!-- <div  class="col-lg-6 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3>ACTUALIZAR</h3>

      <p>POR MARCA</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalActualizarPrecioMarca">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>
 -->





<!--=====================================
MODAL ACTUALIZAR PRECIO POR MARCA
======================================-->

<div id="modalActualizarPrecioMarca" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#dd4b39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Actualizar por Marca</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="seleccionarMarca" name="SeleccionarMarca" required>
                  
                  <option value="">Selecionar Marca</option>
                  <?php 
                    $item = null;
                    $valor= null;

                    $categorias = ControladorProductos::ctrMostrarProductos($item, $valor);

                    foreach ($categorias as $key => $value){
                      echo '<option value="'.$value["id"].'">'.$value["marca"].'</option>';
                    }
                   ?>

                 

                </select>

              </div>

            </div>

                         <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                    <input type="number" class="form-control input-lg" id="porcentajeMarca" name="porcentajeMarca" min="0" placeholder="Ingresar Porcentaje" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

              

                  <!-- ENTRADA PARA PORCENTAJE -->

        

                </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-danger">Guardar categoría</button>

        </div>

        <?php

          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL ACTUALIZAR PRECIO POR CATEGORIA
======================================-->

<div id="modalActualizarPrecioCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#dd4b39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Actualizar por Categoria</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoriaA" name="actualizarPrecioCategoria" required>
                  
                  <option value="">Selecionar categoría</option>
                  <?php 
                    $item = null;
                    $valor= null;

                    $categorias = ControladorCategorias::mostrarCategorias($item,$valor);

                    foreach ($categorias as $key => $value){
                      echo '<option value="'.$value["id_categoria"].'">'.$value["nombre"].'</option>';
                    }
                   ?>

                 

                </select>

              </div>

            </div>

                         <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                    <input type="number" class="form-control input-lg" id="actualizaPorCategoria" name="actualizaPorCategoria" placeholder="Ingresar Porcentaje" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

              

                  <!-- ENTRADA PARA PORCENTAJE -->

        

                </div>

            </div>
  
          </div>

        </div>
        

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-danger">Actualizar Precios</button>

        </div>

        <?php

          $actualizaPorCategoria = new ControladorProductos;
          $actualizaPorCategoria -> ctrActualizarProductosCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL ACTUALIZAR PRECIO POR MARCA
======================================-->

<div id="modalActualizarPrecioSub" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#dd4b39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Actualizar por Marcas</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="ActualizarMarca" name="ActualizarMarca" required>
                  
                  <option value="">Selecionar Marca</option>
                  <?php 
                    $item=null;
                     $valor=null;

                    $marcas=ControladorMarcas::crtmostrarMarcas($item,$valor);;

                    foreach ($marcas as $key => $value){
                      echo '<option value="'.$value["id_marca"].'">'.$value["nombre"].'</option>';
                    }
                   ?>

                 

                </select>

              </div>

            </div>

                         <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-percent"></i></span> 

                    <input type="number" class="form-control input-lg" id="porcentajeSub" name="porcentajeSub" min="0" placeholder="Ingresar Porcentaje" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

              

                  <!-- ENTRADA PARA PORCENTAJE -->

        

                </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-danger">Actualizar</button>

        </div>

         <?php

          $actualizaPorSubCategoria = new ControladorProductos();
          $actualizaPorSubCategoria -> ctrActualizarProductosSubCategoria();

        ?>

      </form>

    </div>

  </div>

</div>
