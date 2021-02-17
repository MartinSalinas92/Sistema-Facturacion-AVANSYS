<?php 

$devoluciones=Controladordevoluciones::crtmostrarDevolucion();

$numeros_devoluciones=count($devoluciones);

$variaciones=VariacionesPrecios::MostrarVariaciones();

$numero_variaciones= count($variaciones);

?>





<div class="content">





<div  class="col-lg-3 col-xs-6">

  <div style="padding:1em 0;" class="small-box bg-green">
    
    <div class="inner">
      
      <h3>DEVOLUCIONES</h3>
    
    </div>
    
    <div class="icon">

    <i class="fa fa-arrow-left"></i>
    
    </div>
    
    <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modalIngresarlasdevoluciones">
      
      DEVOLUCIONES <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div  class="col-lg-3 col-xs-3">

  <div style="padding:1em 0;" class="small-box bg-navy">
    
    <div class="inner">
      
      <h3><?php echo number_format($numeros_devoluciones); ?></h3>

      <p>Registro de Devoluciones</p>
    
    </div>
    
    <div class="icon">
      
      <i class="fa fa-arrow-left"></i>
    
    </div>
    
    <a href="devoluciones-vistas" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>


<div  class="col-lg-3 col-xs-3">

  <div style="padding:1em 0;" class="small-box bg-gray-dark">
    
    <div class="inner">
      
      <h3><?php echo number_format($numero_variaciones); ?></h3>

      <p>Variaciones de Precios</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-social-usd"></i>
    
    </div>
    
    <a href="variacion-precios" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>




<!--=====================================
MODAL ACTUALIZAR PRECIO POR MARCA
======================================-->

<div id="modalIngresarlasdevoluciones" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:GREEN; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">DEVOLUCIONES</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                <input type="hidden" name="idVendedor" value="<?php echo $_SESSION['id_usuario'] ?>">
                        
              </div>

            </div>

            <div class="form-group"> 
                <div class="input-group"> 
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    <select class="form-control" id="nuevoCLiente" name="nuevoCLiente">
                        <option value="">Seleccionar Cliente</option>
                        <?php  
                        $item=null;
                        $valor=null;
                        $cliente=ControladorClientes::ctrMostrarClientes($item,$valor);
                        foreach($cliente as $values){
                          echo '<option value= '.$values['id_cliente'].'>'.$values['nombre'].' </option>';
                        }
                        
                        
                        
                        
                        ?>
                        
                    </select>

                
                
                </div>
            
            
            </div>
            <div class="form-group"> 
                <div class="input-group"> 
                        <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                        <select class="form-control" id="nuevoProducto" name="nuevoProducto"> 
                            <option value=""> Seleccionar Producto</option>
                            <?php 
                             $item= null;
                             $valor= null;
                 
                             $productos=ControladorProductos::ctrMostrarProductos($item,$valor);
                             foreach($productos as $valor){
                                 echo '<option value='.$valor['id_producto'].'>'.$valor['descripcion'].'</option>';
                             }
                            
                            ?>
                        
                        </select>
                
                
                </div>
            
            
            </div>

            <div class="form-group"> 
                <div class="input-group">
                <label>Motivo </label> <br>
                  <textarea class="form-control" id="idMotivo" name="motivos" placeholder="Escribe aqui tu motivo"></textarea>
                
                
                </div>
            
            
            </div>

        
       
             <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-danger">Devolver</button>

                </div>
                <?php

                $devoluciones= new Controladordevoluciones;
                $devoluciones->CrtDevoluciones();

                ?>
            </form>

          </div>

        </div>

        </div>