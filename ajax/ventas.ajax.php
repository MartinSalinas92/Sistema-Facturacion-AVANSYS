<?php 

require_once '../controlladores/ventas.controlador.php';
require_once '../modelos/ventas.modelo.php';



class ajaxfactura{

    public $activarId;
public $activarfactura;

public function activarFacturaporAJAx(){

            $tabla="factura";
            $item1="estado";
            $estado= $this->activarfactura;
            $item2='id_factura';
    
            $id_user=$this->activarId;
    
            $respuesta=ModeloVentas::ActivarFactura($tabla,$item1,$estado,$item2,$id_user);
}

public $idfactura;

public function ajaxdevolver(){
    $item="id_factura";
    $valor=$this->idfactura;
    $respuesta=ModeloVentas::mostrarDevolucionVentas($item,$valor);
    echo json_encode($respuesta);
}

}


switch($_GET['op']){

    case 'activar':
        $id= $_GET['id_user'];
        $estado= $_GET['estado'];
        activarFactura($id,$estado);


};
switch ($_GET['op']) {
    case 'devolucion':
        $id = $_GET['id_user'];
        /*EDITAR USUARIOS*/
        if(isset($id)){
            $editar= new ajaxfactura();
            $editar-> idfactura= $id;
            $editar->ajaxdevolver();
        }
    break;
}

function activarFactura($id,$estado){
    $factura= new ajaxfactura();
    $factura-> activarId=$id;
    $factura-> activarfactura=$estado;
    $factura->activarFacturaporAJAx();
}





?>