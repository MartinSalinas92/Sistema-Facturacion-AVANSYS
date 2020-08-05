
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Variaciones de Precios
      
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
                <th>Descripcion</th> 
                <th>Stock</th> 
                <th>Precio_Compra</th> 
                <th>Nuevo_Precio_Compra</th> 
                <th>Fecha</th> 
          
          
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            <?php  
                
                $variaciones=VariacionesPrecios::MostrarVariaciones();

                //var_dump($variaciones);

                foreach($variaciones as $value){

                    echo '
                    </tr>
                        <td>'.$value['descripcion'].' </td>
                        <td>'.$value['stock'].' </td>
                        <td>'.number_format($value['precio_compra'],2).' </td>
                        <td>'.number_format($value['nuevo_precio_compra'],2).' </td>
                        <td>'.$value['fecha'].' </td>





                    
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