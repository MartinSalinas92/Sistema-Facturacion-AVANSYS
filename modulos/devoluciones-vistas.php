
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
                <th>VENDEDOR</th> 
                <th>CLIENTES</th> 
                <th>PRODUCTOS</th> 
                <th>Motivo</th> 
          
          
              
              
              
              </tr> 
            
            
            </thead>
            <tbody> 
            <?php  
                
                $devoluciones=Controladordevoluciones::crtmostrarDevolucion();

                //var_dump($devoluciones);

                foreach($devoluciones as $value){

                    echo '
                    </tr>
                        <td>'.$value['fecha'].' </td>
                        <td>'.$value['Vendedor'].' </td>
                        <td>'.$value['cliente'].' </td>
                        <td>'.$value['productos'].' </td>
                        <td>'.$value['motivo'].' </td>





                    
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