
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Reportes de Ventas
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
   
        <li class="active"> Reportes de Ventas</li>
      </ol>
    </section>

    
    <section class="content">


      <div class="box">
        <div class="box-header with-border">

        <button type="button" class="btn btn-default" id="daterange-btn2">
            <span> 
              <i class="fa fa-calendar"></i> Rango de Fechas
            </span>
              <i class="fa fa-caret-down"></i>

          </button> 
       
        

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="col-xs-12">

              <?php 

              include "reportes/graficos-ventas.php";
              
              ?> 
            
            
            </div>
          
          
          </div>
     
        </div>
     
      </div>
      <!-- /.box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="col-xs-6">

              <?php 

              include "reportes/graficos-mes.php";
              
              ?> 
            
            
            </div>


          
           <div class="col-xs-6">
           
        <button type="button" class="btn btn-default11" id="daterange-btn11">
            <span> 
              <i class="fa fa-calendar"></i> Rango de Fechas
            </span>
              <i class="fa fa-caret-down"></i>

          </button> 

              <?php 

              include "reportes/graficos-productos_mas_vendidos.php";
              
              ?> 
            
            
            </div>
          
          
          </div>
     
        </div>
     
      </div>
    
      <!-- /.box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            
          </div>
        </div>
        <div class="box-body">
          <div class="row"> 
            <div class="col-xs-6">

              <?php 

              include "reportes/grafico-vendedor.php";
              
              ?> 
            
            
            </div>
          
          
            <div class="col-xs-6">

              <?php 

              include "reportes/grafico-cliente.php";
              
              ?> 
            
            
            </div>
          
          
          </div>
     
        </div>
     
      </div>
      <!-- /.box -->
      

     
    </section>
    <!-- /.content -->
  </div>




