<?php

require_once '../controlladores/compras.controlador.php';
require_once '../modelos/compras.modelo.php';



class ajaxCompras{

     /*=============================================
	MOSTRAR DETALLES DE COMPRAS
    =============================================*/	
    public $idCompra;

    public function ajaxMostrarDetalles(){
        $item='compra_id';
        $valor=$this->idCompra;
        $respuesta=ControladorCompra::ctrMostrarDetalles($item,$valor);
        echo json_encode($respuesta);


    }

}



switch($_GET['op']){
    case 'mostrar':
        $id= $_GET['id_user'];
        if(isset($id)){
            $mostrar= new ajaxCompras;
            $mostrar-> idCompra = $id;
            $mostrar->ajaxMostrarDetalles();
        }
}

?>