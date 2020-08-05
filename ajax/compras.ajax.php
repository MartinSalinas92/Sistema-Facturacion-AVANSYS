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

    public $activarId;
    public $activarCompra;

    public function activarCompra(){
        $tabla="compras";
        $item1="estado";
        $estado= $this->activarCompra;
        $item2="id_compra";

        $id_user=$this->activarId;

        $respuesta=ModeloCompras::ActivarCompra($tabla,$item1,$estado,$item2,$id_user);

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

switch($_GET['op']){
    case 'activar':
        $id=$_GET['id_user'];
        $estado=$_GET['estado'];
        activar($id,$estado);
}


function activar($id,$estado){
    $activarCompra= new ajaxCompras;
    $activarCompra-> activarId=$id;
    $activarCompra-> activarCompra=$estado;
    $activarCompra->activarCompra();
}



?>