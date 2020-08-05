
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ventas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar Ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <a href="crear-ventas"> 
          <button class="btn btn-primary" >
          
            <i class="fa fa-plus-square" aria-hidden="true"></i>
            
          
          
          </button>
          </a>
          <button type="button" class="btn btn-default pull-right" id="daterange-btn">
            <span> 
              <i class="fa fa-calendar"></i> Rango de Fechas
            </span>
              <i class="fa fa-caret-down"></i>

          </button> 
       
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                <th>Codigo </th> 
                <th>Fecha</th> 
                <th>tipo_factura</th> 
                <th>Codigo_factura </th> 
                <th>Tipo_Pago</th> 
                <th>Total_general</th> 
                <th>Vendedor</th> 
                <th>Cliente </th> 
                <th>Estado </th> 
                <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
              <tr>
              
                <?php
                if(isset($_GET['fechaInicial'])){
                $fechaInicial=$_GET['fechaInicial'];
                $fechaFinal=$_GET['fechaFinal']; 
                $item= null;
                $valor= null;
                $respuesta=ControladorVenta::ctrMostrarVentas($item, $valor,$fechaInicial,$fechaFinal);

                
                

                //$respuesta1=ControladorVenta::ctrMostrardetalles($item1);

                //var_dump($respuesta1);
                foreach ($respuesta as $value) {

                  echo '
                  <tr>
                    <td>'.$value['id_factura'].' </td>
                    <td>'.$value['fecha'].' </td>
                    <td>'.$value['tipo_factura'].' </td>
                    <td>'.$value['codigo_factura'].'</td>
                    <td>'.$value['tipo_pago'].'</td>
                    <td>'.number_format($value['total_general'],2).'</td>';
                   


                    $itemUsuario = "id_usuario";
                    $valorUsuario = $value["usuario_id"];
  
                    $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);
  
                    echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                    $itemCliente = "id_cliente";
                    $valorCliente = $value["cliente_id"];
  
                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);
  
                    echo '<td>'.$respuestaCliente["nombre"].'</td>';

                    if($value['estado'] !=0){
                      echo '<td><button type="button" class="btn btn-success btn-xs btnActivarFactura" idfactura="'.$value['id_factura'].'" estadofactura="0">Anular Venta</button></td>';
                    }else{
                      echo '<td><button type="button" class="btn btn-danger btn-xs btnActivarFactura" idfactura="'.$value['id_factura'].'" estadofactura="1">Venta anulada</button></td>';
                    };
                  

                   echo '<td>

                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura"  codigo_venta='.$value['codigo_factura'].'>

                        <i class="fa fa-print"></i>

                      </button>';


                    

                      if($value['estado'] !=0){
                        echo ' <button class="btn btn-success btnEliminarFactura" idfactura="'.$value['id_factura'].'"><i class="fa fa-check" estadofactura="1"></i> </button>
                        </div>';
                        }else{
                        echo '<button class="btn btn-danger btnEliminarFactura" idProducto="'.$value['id_factura'].'"><i class="fa fa-times" estadofactura="0"></i> </button>
                        </div>
                        }
          


                  </td>
  
                    
  
                  
                  
                
                  
                  </tr>';
                      }
                  
                }
                
              }else{
                
                $fechaInicial=null;
                $fechaFinal=null;
                $item=null;
                $valor=null;
                $respuesta=ControladorVenta::ctrMostrarVentasss($item,$valor,$fechaInicial,$fechaFinal);
                foreach ($respuesta as $value) {

                  echo '
                  <tr>
                    <td>'.$value['id_factura'].' </td>
                    <td>'.$value['fecha'].' </td>
                    <td>'.$value['tipo_factura'].' </td>
                    <td>'.$value['codigo_factura'].'</td>
                    <td>'.$value['tipo_pago'].'</td>
                    <td>'.$value['total_general'].'</td>';


                    $itemUsuario = "id_usuario";
                    $valorUsuario = $value["usuario_id"];
  
                    $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);
  
                    echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                    $itemCliente = "id_cliente";
                    $valorCliente = $value["cliente_id"];
  
                    $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);
  
                    echo '<td>'.$respuestaCliente["nombre"] .'   '. $respuestaCliente['apellido'].'</td>';

                    if($value['estado'] !=0){
                      echo '<td><button type="button" class="btn btn-success btn-xs btnActivarFactura" idfactura="'.$value['id_factura'].'" estadofactura="0">Anular Venta</button></td>';
                    }else{
                      echo '<td><button type="button" class="btn btn-danger btn-xs btnActivarFactura" idfactura="'.$value['id_factura'].'" estadofactura="1">Venta Anulada</button></td>';
                    };

                   echo '<td>
                   
                    
                    <div class="btn-group">
                        
                      <button class="btn btn-info btnImprimirFactura"  codigo_venta='.$value['codigo_factura'].'>

                        <i class="fa fa-print"></i>

                      </button>
                      
                      
                      ';
                    


                     if($value['estado'] !=0){
                        echo ' <button class="btn btn-success btnEliminarFactura" idfactura="'.$value['id_factura'].'"><i class="fa fa-check" estadofactura="1"></i> </button>
                        </div>';
                        }else{
                        echo '<button class="btn btn-danger btnEliminarFactura" idfactura="'.$value['id_factura'].'"><i class="fa fa-times" estadofactura="0"></i> </button>
                        </div>
                        ';
                      }



                        echo'
                        <button class="btn btn-warning devolucionFactura" iddevFactura="'.$value['id_factura'].'" ><i class="fa fa-reply" aria-hidden="true"></i></button>

                        <button class="btn btn-dark devolucionStock" idstokFactura="'.$value['id_factura'].'">
                        <i class="fa fa-reply-all" aria-hidden="true"></i>
                        
                        </button>
                      

          


                  </td>

  
                    
  
                  
                  
                
                  
                  </tr>';
                    
              }
              }
                
                
                ?>
            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>
    
      

    </section>

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

              <input type="hidden"  id="idfactura" name="idfactura" value="" required>
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                <input type="text" class="form-control input-lg" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION['nombre'] ?>" readonly>
                <input type="hidden" name="idVendedor" value="<?php echo $_SESSION['id_usuario'] ?>">
                        
              </div>

            </div>

            <div class="form-group"> 
                <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-key"> </i></span>
                    
                <input type="text" class="form-control input-lg" id="codigofactura" name="codigofactura" value="" readonly>

                
                
                </div>
            
            
            </div> 
            <div class="form-group"> 
                <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                <input type="text" class="form-control input-lg" id="nombreCliente" name="nombreCLiente" value="" required>

                
                
                </div>
            
            
            </div>
            <div class="form-group"> 
                <div class="input-group"> 
            
                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                    
                <input type="text" class="form-control input-lg" id="apellidoCliente" name="apellidoCLiente" value="" required>

                
                
                </div>
            
            
            </div>
            
            <div class="form-group"> 
            <div class="input-group">

                <select class="form-control input-md" id="descripcionProducto" name="descripcionProducto" required>

                <?php 
      
                $valor='';
                $respuesta=ModeloVentas::mostrarDevolucionVentasmodal($valor);
                var_dump($respuesta);

                foreach($respuesta as $value){
                  echo'
                    <option>'.$value['descripcion'].' </option>
                  
                  
                  ';
                }

                
                
                
                ?>

                  
                 
                
                
                </select>
              </div> 


           </div>
            
            
          

            <div class="form-group"> 
                <div class="input-group">
                <label>Motivo </label> <br>
                  <select class="form-control input-lg" id="tipoMotivo" name="tipoMotivo" required> 
                    <option value="">Seleccionar Motivo</option>
                    <option value="vencido" name="vencido">Vencido o Dañado </option>
                    <option value="" name="devolver">Devolver al stock </option>
                  
                    <option> </option>
                  
                  
                </select >
                
                
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
        </div>
        </div>

    
  