<?php
require_once '../controlladores/productos.controlador.php';
require_once '../modelos/productos.modelo.php';


class ajaxProducto{
     /*=============================================
	EDITAR CATEGORIA
    =============================================*/	
 public function traerUltimoCode(){
    $respuesta=ControladorProductos::mostrarUltimoCode();
    echo json_encode($respuesta);     
    }
      /*=============================================
	EDITAR PRODUCTO
    =============================================*/
    public $idProducto;

    public function ajaxEditarProductos(){
        $item="id_producto";
        $valor=$this->idProducto;
        $respuesta= ControladorProductos::ctrMostrarProductos($item,$valor);
        echo json_encode($respuesta);
    }
    public $activarId;
        public $activarProducto;
        public function ajaxActivarProducto(){
            $tabla="productos";
            $item1="estado";
            $estado= $this->activarProducto;
            $item2='id_producto';
    
            $id_user=$this->activarId;
    
            $respuesta=modeloProductos::ActivarProductos($tabla,$item1,$estado,$item2,$id_user);
    }
}
switch ($_GET['op']) {
    case 'ultimocode':
    $code = new ajaxProducto;
    $code->traerUltimoCode();

    break;
    case 'editar':
    $id= $_GET['id_user'];
    if(isset($id)){
        $editar= new ajaxProducto;
        $editar->idProducto=$id;
        $editar->ajaxEditarProductos();
    }
}

switch($_GET['op']){
    case'activar':
    $id = $_GET['id_user'];
    $estado=$_GET['estado'];
    activar($id,$estado);
break;
}

function activar($id,$estado){
    $activarProducto= new ajaxProducto;
    $activarProducto-> activarProducto= $estado;
    $activarProducto-> activarId= $id;
    $activarProducto->ajaxActivarProducto();
}

?>