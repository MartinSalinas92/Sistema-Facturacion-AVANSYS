
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Compras
      
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
          <a href="crear-compras">

            <button class="btn btn-primary">
          
              <i class="fa fa-plus-square" aria-hidden="true"></i>
            
          
             </button>
          </a>
          <button type="button" class="btn btn-default pull-right" id="daterange-btn-Compras">
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
                <th>Codigo_Compra</th> 
                <th>tipo_factura</th> 
                <th>tipo_pago</th> 
                <th>Total_general</th> 
                <th>Fecha </th> 
                <th>Usuario</th> 
                <th>Proveedor</th>
               <th>Acciones </th> 
              
              
              
              </tr> 
            
            
            </thead>
            <tbody>
           
           
            
              <?php 

                      if(isset($_GET['fechaInicial'])){
                        $fechaInicial=$_GET['fechaInicial'];
                        $fechaFinal=$_GET['fechaFinal']; 
                        $item= null;
                        $valor= null;

                        
                      $respuesta=ControladorCompra::ctrMostrarCompras($fechaInicial,$fechaFinal,$item,$valor);  




                      //$respuesta1=ControladorVenta::ctrMostrardetalles($item1);

                      //var_dump($respuesta);
                        foreach ($respuesta as $value) {

                      echo '
                      <tr>
                      <td>'.$value['id_compra'].'</td>
                      <td>'.$value['codigo_factura'].' </td>
                      <td>'.$value['tipo_factura'].' </td>
                      <td>'.$value['tipo_pago'].'</td>
                      <td>'.number_format($value['total_general'],2).'</td>
                      <td>'.$value['fecha'].'</td>';


                      $itemUsuario = "id_usuario";
                      $valorUsuario = $value["usuario_id"];

                      $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);

                      echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                      $itemCliente = "id_proveedor";
                      $valorCliente = $value["proveedor_id"];

                      $respuestaProveedor = ControladorProveedores::crtMostrarProveedores($itemCliente,$valorCliente);
                   
                      echo '<td>'.$respuestaProveedor["razon_social"].'</td>';


                      echo '<td>

                      <div class="btn-group">

                          

                        <button class="btn btn-info btnImprimirCompra"  codigo_venta='.$value['id_compra'].'>

                          <i class="fa fa-eye"></i>

                        </button>
                      






                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>';

                      // }

                      echo '</div>  

                      </td>







                      </tr>';


                      }
                    }else{

                      


                      $fechaInicial=null;
                       $fechaFinal=null; 
                       $item= null;
                      $valor= null;
                      
                      $respuesta=ControladorCompra::ctrMostrarCompras($fechaInicial,$fechaFinal,$item,$valor);  
                      
                  
                  
                  
                  //$respuesta1=ControladorVenta::ctrMostrardetalles($item1);
                  
                  //var_dump($respuesta);
                      foreach ($respuesta as $value) {
                  
                                echo '
                                <tr>
                                <td>'.$value['id_compra'].' </td>
                                <td>'.$value['tipo_factura'].' </td>
                                <td>'.$value['tipo_pago'].'</td>
                                <td>'.number_format($value['total_general'],2).'</td>
                                <td>'.$value['fecha'].'</td>';
                  
                  
                                $itemUsuario = "id_usuario";
                                $valorUsuario = $value["usuario_id"];
                  
                                $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);
                  
                                echo '<td>'.$respuestaUsuario["nombre"].'</td>';
                  
                                $itemCliente = "id_proveedor";
                                $valorCliente = $value["proveedor_id"];
                  
                                $respuestaProveedor = ControladorProveedores::crtMostrarProveedores($itemCliente,$valorCliente);
                  
                                echo '<td>'.$respuestaProveedor["razon_social"].'</td>';

                              
          
                                echo '<td>



                                <div class="btn-group">

                                
                                  
                                
                                  <a href=index.php?ruta=detalle&idCompra='.$value['id_compra'].'>
                                  <button class="btn btn-info btnImprimirCompra"  idcompra='.$value['id_compra'].'
                                  
                                  data-toggle="modal" data-target="#MostrarDetalle">
          
                                    <i class="fa fa-eye"></i>
          
                                  </button>
                                  </a>
                                
                            
                      
            
            
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


  
        




  