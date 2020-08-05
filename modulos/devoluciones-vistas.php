
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DEVOLUCIONES
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
   
        <li class="active">Administrar DEVOLUCIONES</li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">


        
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas">
            <thead>
              <tr>
                
                <th>FECHA</th> 
                <th>MOTIVO</th> 
                <th>VENDEDOR</th>
                <th>CLIENTE</th> 
                <th>CODIGO_FACTURA</th>
                <th>Acciones</th>
          
          

              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            <?php  

                    $devoluciones=Controladordevoluciones::crtmostrarDevolucion();

                    //var_dump($devoluciones);

                    foreach($devoluciones as $value){
                      

            
                      echo
                      '<tr>
                      
                      <td>'.$value['fecha'].'</td>
                      <td>'.$value['motivo'].'</td>';


                        $itemUsuario = "id_usuario";
                        $valorUsuario = $value["usuario_id"];

                        $respuestaUsuario = ControladorUsuarios::mostrarUsuarios($itemUsuario,$valorUsuario);

                        echo '<td>'.$respuestaUsuario["nombre"].'</td>';

                        $itemCliente = "id_cliente";
                        $valorCliente = $value["cliente_id"];
      
                        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);
      
                        echo '<td>'.$respuestaCliente["nombre"] .'   '. $respuestaCliente['apellido'].'</td>';

                        $fechaInicial=null;
                        $fechaFinal=null;
                        $item='id_factura';
                        $valor=$value['factura_id'];
                        $resultado=ControladorVenta::ctrMostrarVentas($item,$valor,$fechaInicial,$fechaFinal);
                        //var_dump($resultado);
  
                        echo '<td>'. $resultado['codigo_factura'].'</td>';



                        echo '<td>



                        <div class="btn-group">


                          
                          <a href="index.php?ruta=detalledevolucioness&idDevolucion='.$value['id_devolucion'].'">

                          <button class="btn btn-info btnImprimirDevolucion"  idDevolucion="'.$value['id_devolucion'].'"
                          
                          data-toggle="modal" data-target="#MostrarDetalle">

                            <i class="fa fa-eye"></i>

                          </button>

                          </a>





                        </td>







                        </tr>';
                

                    }



                ?>
            
            
            
            </tbody>
          
          
          </table>

        </div>
        
       
      </div>

      </div>
  
      

    </section>
    
 </div>
