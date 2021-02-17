
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Ventas
      
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
        <div class="col-lg-5 col-xs-12">

          <div class="box box-success">
                <div class="box-header with-border"> </div>
                <form role="form" method="post" class="formularioVenta">
                 
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
                               ENTRADA DE VENTA
                              =========================================================-->
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"> </i> </span> 

                                    <?php
                                    $fechaInicial=null;
                                    $fechaFinal=null;
                                    $item=null;
                                    $valor=null;
                                    
                                    $ventas=ControladorVenta::ctrMostrarVentas($item,$valor,$fechaInicial,$fechaFinal);

                                    if(!$ventas){
                                      echo '<input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVenta" value="1001" readonly>';
                                    }else{
                                      foreach($ventas as $values){

                                      }
                                      $codigo=$values['codigo_factura'] + 1;
                                      echo '<input type="text" class="form-control input-lg" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';


                                    }

                                    
                                    
                                    ?>
                                    
                        
                                  </div>
                                </div>
                               
                                
                                <!--======================================================
                               ENTRADA DE CLIENTE
                              =============================================-->
                              
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"> </i> </span> 
                                      <select class="form-control" name="idCliente" required>
                                        <option value=""> Seleccionar Cliente </option>
                                        <?php
                                        $item= null;
                                        $valor= null;

                                        $respuesta= ControladorClientes::ctrMostrarClientes($item,$valor);
                                        foreach($respuesta as $values){
                                          echo '<option value='.$values['id_cliente'].'>'.$values['nombre'].' </option>';
                                        }
                                  
                                        
                                        
                                        ?>

                                      </select>
                                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#AgregarClientes" data-dismiss="modal">  <i class="fa fa-user-plus" aria-hidden="true"></i></button></span>
                        
                                  </div>
                                </div>

                                <!--======================================================
                               Tipo de Factura
                              =========================================================-->
                              <label> tipo de Factura </label>
                              <div class="form-group">
                                  <div class="input-group">
                                        <select class="form-control input-lg" id="idtipofactura"  name="idtipo_factura"> 
                                          <option value=""> Seleccionar tipo de factura </option>
                                          <option value="A"> A </option>  
                                          <option value="B"> B </option>  
                                          <option value="C"> C </option>  
                                        
                                        
                                        
                                        </select>
                                  
                                  
                                  </div> 
                              
                              
                              </div>
                                  


                            
                                <!--======================================================
                               ENTRADA DE PRODUCTO
                              =========================================================-->

                              <div class="form-group row nuevoProducto">

                               
                           


                    
                            </div>
                            <input type="hidden" name="listarProductos" id="listarProductos">
                              <!--======================================================
                                BOTON PARA AGREGAR PRODUCTO
                                =========================================================-->
                                <button type="button" class="btn btn-default hidden-lg btnAgregarProductoss">Agregar producto</button>

          <hr>

          <div class="row">

            <!--=====================================
            ENTRADA IMPUESTOS Y TOTAL
            ======================================-->
            
            <div class="col-xs-8 pull-right">
              
              <table class="table">

                <thead>

                  <tr>
                    <th>Impuesto</th>
                    <th>Total</th>      
                  </tr>

                </thead>

                <tbody>
                
                  <tr>
                    
                    <td style="width: 50%">
                      
                      <div class="input-group">
                    
                        <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required onchange="agregarImpuestos()">

                        

                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
                      </div>

                    </td>

                    <td style="width: 50%">
                      
                      <div class="input-group">
                    
                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" readonly required>

                  
                        
                  
                      </div>

                    </td>

                  </tr>

                </tbody>

              </table>

            </div>

          </div>

          <hr>
         

         <!--=====================================
          ENTRADA MÉTODO DE PAGO
           ======================================-->                       

   <div class="form-group row">
                                      
       <div class="col-xs-6" style="padding-right:0px">
                                        
                <div class="input-group">
                                      
                           <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                               <option value="">Seleccione método de pago</option>
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta_Credito">Tarjeta Crédito</option>
                                 <option value="Tarjeta_Debito">Tarjeta Débito</option>                  
                            </select>    

                   </div>

          </div>

          <div class="cajasMetodoPago"></div>

          

          </div>

          <br>

     
       </div>
       </div>
        
                                
       
          <div class="box-footer">

              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>

                          
                                                        
                            </div> 
                    
                       </form>
                  <?php 

                    $GuardarVentas= new ControladorVenta();
                    $GuardarVentas->ctrCrearVentas();
                  
                  ?>
                   </div>
                
                 </div>
            
             
              

        <!--======================================================
        TABLA DE PRODUCTO
  =========================================================-->
  <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
    

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
              <th>Nombre</th> 
              <th>descripcion</th> 
              <th>codigo</th> 
              <th>stock</th>
             <th>Acciones</th>
              
              
              
              
              </tr> 
            
            
            </thead>
            
            <tbody> 
             
             <?php 
             $item= null;
             $valor= null;
 
             $productos=ControladorProductos::ctrMostrarProductos($item,$valor);
             /*var_dump($productos);*/
 
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
                 <td>'.$values['nombre'].'</td>
                 <td>'.$values['descripcion'].'</td>
                 <td>'.$values['codigo'].'</td>';
 
 
                
                
 
                 if($values['stock'] <= $values['stock_min']){
                   echo '<td><span class="btn btn-danger" id="stock'.$values['id_producto'].'" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td>';
                 }else if($values['stock'] <= 5){
                   echo '<td><span  class="btn btn-warning" id="stock'.$values['id_producto'].'" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td>';
                 }else{
                   echo '<td><span class="btn btn-success" id="stock'.$values['id_producto'].'" idProducto="'.$values['id_producto'].'">'.$values['stock'].'</span></td>';
                 }
 
                
                 echo'
                 
                
                 <td> 
                 <div class="btn-group">
 
                 <button class="btn btn-primary btnAgregarProductos" id="btnbtn'.$values['id_producto'].'" idPorducto="'.$values['id_producto'].'" onclick="editp(\''.$values['id_producto'].'\',\''.$values['nombre'].'\',\''.$values['descripcion'].'\',\''.$values['codigo'].'\',\''.$values['stock'].'\',\''.$values['precio_venta'].'\');">
           
                 <i class="fa fa-plus-square" aria-hidden="true"></i>
                 
               
               </button>
 
               <button style="display:none"  class="btn btn-success" id="btnocut'.$values['id_producto'].'"> 
 
               <i class="fa fa-check"></i>
               
               
               </button>
 
 
              
                 </div>
                 
                 
                 </td>
                 
               
               
               
               
               </tr>';
             }
             
             
             ?>
                
             
             
             
             </tbody>
          
          
          </table>

        </div>
        
       
      </div>
      

    </section>

    </div>


     <!--======================================================
        MODAL AGREGAR  clientes
  =========================================================-->
  
  <div class="modal fade" id="AgregarClientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form rol="form" method="post" enctype="multipart/form-data"> <!--enctype="multipart/form-data" para separar los archivos por ejemplo fotos etc-->
  <!--======================================================
        CABEZA DEL MODAL
  =========================================================-->
        <div class="modal-header" style="background:#ff851b; color:orange">
          <h5 class="modal-title" id="exampleModalLabel" style="color:#000000">Agregar Clientes</h5>
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
                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL APELLIDO -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoApellido" placeholder="Ingresar Apellido" required>
            </div>
          </div> 
        <!--ENTRADA PARA EL DNI -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-address-card" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevoDNI" placeholder="35778898" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA LOCALIDAD -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaLocalidad" placeholder="Formosa Capital" required>
            </div>
          </div> 
        <!--ENTRADA PARA LA DIRECCION -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="b illia2 mz49 " required>
            </div>
          </div> 
        <!--ENTRADA PARA LA calle -->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-road" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="nuevaCalle" placeholder="arenales y mouchard">
            </div>
          </div> 
        <!--ENTRADA PARA EL NUMERO DE CALLE-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-street-view" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="numerodeCalle" >
            </div>
          </div> 
        
        <!--ENTRADA PARA EL NUMERO DE CASA-->
          <div class="form-group"> 
            <div class="input-group"> 
            
              <span class="input-group-addon"><i class="fa fa-home" aria-hidden="true"></i> </span>
                <input type="text" class="form-control input-lg" name="numerodeCasa" placeholder="numero de casa" >
            </div>
          </div> 
        <!--ENTRADA PARA EL DEPARTAMENTO O PISO-->
          <div class="form-group"> 
            <div class="input-group"> 
              <span class="input-group-addon"><i class="fa fa-contao""> </i> </span>
                <input type="text" class="form-control input-lg" name="nuevoDepartamento">
            </div>
          </div> 
        
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class ="btn btn-primary"> Guardar Clientes </button>
      <div>

      <?php

        $crearClientes= new ControladorClientes;
        $crearClientes->ctrCrearClientesVentas();

      ?>

    
      </form>
       
                </div> 

            </div>
  
        </div>


      </div>
  



