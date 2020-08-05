<!-- =============================================== -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mostrar Devoluciones Stock
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   
        <li class="active">Ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!--======================================================
        FORMULARIO
  =========================================================-->
        <div class="col-lg-12 col-xs-12">

          <div class="box box-success">
                <div class="box-header with-border"> </div>
                <form role="form" method="post" class="formularioVentaDevolucionesStock">
                 
                  <div class="box-body"> 
                      
                          <div class="box">
                          
                            <!--======================================================
                               ENTRADA DEL VENDEDOR
                              =========================================================-->
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"> </i> </span> 
                                    <input type="text" class="form-control input-lg" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION['id_usuario'] ?>">
                        
                                  </div>
                                </div>
                               
                          <!--======================================================
                               ENTRADA DEL CLIENTE
                              =========================================================-->
                               <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"> </i> </span> 
                                 
                                     <?php 

                                       
                                          $fechaInicial=null;
                                          $fechaFinal=null;
                                          $itemVenta='id_factura';
                                          $valorVenta=$_GET['idFactura'];

                                          $resultado=ControladorVenta::ctrMostrarVentas($itemVenta,$valorVenta,$fechaInicial,$fechaFinal);

                                          //var_dump($resultado);
                                          
                                            $item='id_cliente';
                                            $itemValor=$resultado['cliente_id'];
                                            $respuestaCliente=ControladorClientes::ctrMostrarClientes($item,$itemValor);
                                            //var_dump($respuestaCliente);

                                 
                    
                                          echo ' <input type="text" class="form-control input-lg" id="idCliente" name="idCliente" value="'.$respuestaCliente['nombre'] .'  '.$respuestaCliente['apellido'].'" readonly> 
                                          
                                          <input type="hidden" name="idCLientes" value="'.$respuestaCliente['id_cliente'].'?>"';
                                        
                                    ?>

                                  
                                    
                        
                                  </div>
                                </div>
                                <!--======================================================
                               ENTRADA DE VENTA
                              =========================================================-->
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"> </i> </span> 

                                    <?php
                                     $fechaInicial=null;
                                     $fechaFinal=null;
                                     $itemVenta='id_factura';
                                     $valorVenta=$_GET['idFactura'];

                                     $resultado=ControladorVenta::ctrMostrarVentas($itemVenta,$valorVenta,$fechaInicial,$fechaFinal);

                                      echo '<input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVentaDevo" value="'.$resultado['codigo_factura'].'" readonly>';


                                    

                                    
                                    
                                    ?>
                                    
                        
                                  </div>
                                </div>
                                <label> Motivo </label>
                              <div class="form-group">
                                  <div class="input-group">
                                        <select class="form-control input-lg" id="idMotivoStock"  name="tipoMotivoStock" required> 

                                              
                                              <option value="">MOTIVO DEVOLUCION</option>
                                              <option value="vencido">cambio de producto</option>
                                              <option value="vencido">otro</option>
                                           
                                              
                                          
                                                

                                          </select>
                                            
                                        
                                        
                                        
                                        </select>
                                  
                                  
                                  </div> 
                              
                              
                              </div>
                                  
                                  
                               
                                
                                
                                

                                  


                            
                                <!--======================================================
                               ENTRADA DE PRODUCTO
                              =========================================================-->

                              <div class="form-group row nuevoProductoDevolucionStock">

                               
                           


                    
                            </div>
                            <input type="hidden" name="listarProductosDS" id="listarProductosDS">
                              <!--======================================================
                                BOTON PARA AGREGAR PRODUCTO
                                =========================================================-->
                                <button type="button" class="btn btn-default hidden-lg btnAgregarProductoss">Agregar producto</button>

          

         

        
                                
       
          <div class="box-footer">

              <button type="submit" class="btn btn-primary pull-right">Realizar Devolucion a Stock</button>

               
       
                          
                                                        
                    
                
                 </div>
                 <?php

                    $devolverStock= new ControladordevolucionesStock;
                    $devolverStock->CrtDevolucionesStock();



              

                  ?>

                 </form>

                

              </div>



              </div>
                
            
             
              

        <!--======================================================
        TABLA DE PRODUCTO
  =========================================================-->
  <div class="col-lg-12">
    

      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-header with-border">
         
        </div>
        <div class="box-body">
      <!-- Default box -->
   
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
          <thead>
              <tr>
              <th>Imagen</th> 
              <th>descripcion</th> 
              <th>Cantidad</th> 
             <th>Acciones</th>
              
              
              
              
              </tr> 
            
            
            </thead>
            
            <tbody> 
             
             <?php 


                $fechaInicial=null;
                $fechaFinal=null;
                $itemVenta='id_factura';
                $valorVenta=$_GET['idFactura'];

                $resultado=ControladorVenta::ctrMostrarVentas($itemVenta,$valorVenta,$fechaInicial,$fechaFinal);
                //var_dump($resultado);

                $item2=$resultado['id_factura'];

                
                $resultadoDetalle=ControladorVenta::ctrMostrardetalles($item2);
                 //var_dump($resultadoDetalle);




                   
                  foreach ($resultadoDetalle as $res) {
                    $item='id_producto';
                    $value=json_decode($res["producto_id"], true);
                    $Mostrarproductos=ControladorProductos::ctrMostrarProductos($item,$value);
                    //var_dump($Mostrarproductos);
                    
                   
                     
               
               echo'
               <tr>
 
               <td>';

               if($Mostrarproductos['estado'] !=0){
             
               if($Mostrarproductos['imagen'] !=''){
                 echo '<img src="'.$Mostrarproductos['imagen'].'" class="img-fluid img-thumbnail" width=40px> ';
             }else{
               echo ' <img src="vistas/img/productos/anonymous.png" class="img-fluid img-thumbnail" width=30px> </td>';
             }
             echo '

                 <td>'.$Mostrarproductos['descripcion'].'</td>
                 <td>'.$res['cantidad'].'</td>';
             
 
 
              
 
                
                 echo'
                 
                
                 <td> 
                 <div class="btn-group">
 
                 <button class="btn btn-primary btnAgregarProductosDevolucion" id="btnbtndev'.$Mostrarproductos['id_producto'].'" idPorducto="'.$Mostrarproductos['id_producto'].'" onclick="editpdevoluciones(\''.$Mostrarproductos['id_producto'].'\',\''.$Mostrarproductos['descripcion'].'\',\''.$res['cantidad'].'\')">
           
                 <i class="fa fa-plus-square" aria-hidden="true"></i>
                 
               
               </button>
 
               <button style="display:none"  class="btn btn-success" id="btnocutdev'.$Mostrarproductos['id_producto'].'"> 
 
               <i class="fa fa-check"></i>
               
               
               </button>
 
 
              
                 </div>
                 
                 
                 </td>';
                }
                 
               
               
               
               
               '</tr>';
                
             
            
                  }
             ?>
                
             
             
             
             </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>

    </div>
    </div>

    

  



