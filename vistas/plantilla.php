<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Avansys</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


  <!--======================================================
        PLUGINS CSS
  =========================================================--  !>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">
  <link rel='icon' href="vistas/img/plantilla/maquina-expendedora.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
  
   <!-- Daterange picker -->
   <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

   <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!--======================================================
        PLUGINS JAVASCRIPT
  =========================================================--  !>

  <!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<!-- jQuery Number -->
<script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <!-- iCheck 1.0.1 -->
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

<!--barCode-->
<script src="vistas/bar_code/JsBarcode.all.min.js"></script>

<!-- daterangepicker http://www.daterangepicker.com/-->
<script src="vistas/bower_components/moment/min/moment.min.js"></script>
<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>


  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>



<!--======================================================
        CUERPO DOCUMENTO
  =========================================================--  !>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet" src="vistas/dist/skins/skin-green-light.css">
</head>
<body class="hold-transition skin-yellow sidebar-collapse sidebar-mini login-page"> 
<!-- Site wrapper -->

<?php
if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

echo '<div class="wrapper">';



    /*-======================================================
        CABEZA DE LA PAGINA
=========================================================--  */

        include 'modulos/head.php';
        
/*-======================================================
        MENU DE LA PAGINA
=========================================================--  */


        include 'modulos/menu.php';

    /*-======================================================
        CONTENIDO
=========================================================--  */




if(isset($_GET['ruta'])){
        if($_GET['ruta']=='inicio'||
        $_GET['ruta']=='usuarios' ||
        $_GET['ruta']=='horarios'||
        $_GET['ruta']=='proveedores'||
        $_GET['ruta']=='categorias'||
        $_GET['ruta']=='marcas' ||
        $_GET['ruta']=='compras' ||
        $_GET['ruta']=='crear-compras' ||
        $_GET['ruta']=='crear-devostock' ||
        $_GET['ruta']=='reportes-compras' ||
        $_GET['ruta']=='detalledevolucioness' ||
        $_GET['ruta']=='productos' ||
        $_GET['ruta']=='clientes' ||
        $_GET['ruta']=='devoluciones-vistas' ||
        $_GET['ruta']=='crear-devoluciones' ||
        $_GET['ruta']=='variacion-precios' ||
        $_GET['ruta']=='ventas' ||
        $_GET['ruta']=='detalle' ||
        $_GET['ruta']=='crear-ventas' ||
        $_GET['ruta']=='reportes' ||
        $_GET['ruta']=='salir' ){
         include "modulos/".$_GET['ruta'].".php";
        }else{
                include 'modulos/404.php';
        }
        }else{

        include "modulos/inicio.php";
  
      }


    /*-======================================================
        Footer
=========================================================--  */


include 'modulos/footer.php';

echo '</div>';


}else{
        include 'modulos/login.php';
}
switch ($_GET['ruta']) {
        case 'usuarios':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/usuarios.js "> </script>';
        break;
        case 'proveedores':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/proveedores.js "> </script>';

        break;
        case 'categorias':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/categorias.js "> </script>';

        break;
        case 'marcas':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/marcas.js "> </script>';

        break;
        case 'productos':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/productos.js "> </script>';

        break;
        case 'clientes':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/clientes.js "> </script>';

        break;
        case 'ventas':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/ventas.js "> </script>';

        break;
        case 'crear-ventas':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/crear-ventas.js "> </script>';

        break;
        case 'compras':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/compras.js "> </script>';

        break;
        case 'crear-compras':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/crear-compras.js "> </script>';

        break;
        case 'reportes':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/reportes.js "> </script>';

        break;
        case 'reportes-compras':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/reportes-compras.js "> </script>';

        break;
        case 'devoluciones-vistas':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/devoluciones.js "> </script>';

        break;
        case 'crear-devoluciones':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/crear-devoluciones.js "> </script>';

        break;
        case 'crear-devostock':
        echo '<script src="vistas/js/plantilla.js "> </script>
                <script src="vistas/js/crear-devostock.js "> </script>';

        break;

        default:
                echo '<script src="vistas/js/plantilla.js "> </script>';
                break;
}
?>

 <!--
<script src="vistas/js/plantilla.js "> </script>

<script src="vistas/js/usuarios.js "> </script>
<script src="vistas/js/categorias.js "> </script>
<script src="vistas/js/marcas.js "> </script>
<script src="vistas/js/proveedores.js "> </script>
<script src="vistas/js/productos.js "> </script>-->


</body>
</html>