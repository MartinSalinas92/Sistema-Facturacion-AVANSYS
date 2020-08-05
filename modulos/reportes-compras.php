<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Reportes de Compras
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Home</a></li>
   
        <li class="active"> Reportes de Compras</li>
      </ol>
    </section>

    
    <section class="content">


      <div class="box">
        <div class="box-header with-border">

        <button type="button" class="btn btn-default" id="daterange-btn4">
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

              include "reportes_compras/grafico-compras.php";
              
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

              include "reportes_compras/grafico-mes-compras.php";
              
              ?> 
            
            
            </div>
          
           <div class="col-xs-6">

              <?php 

              include "reportes_compras/grafico-productos-compras.php";
              
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
           <div class="col-xs-12">

              <?php 

              include "reportes_compras/grafico-proveedores.php";
              
              ?> 
            
            
            </div>
          
          
          </div>
     
        </div>
     
      </div>
      <!-- /.box -->
      

     
    </section>
    <!-- /.content -->
  </div>




