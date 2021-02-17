<?php

require_once '../controlladores/proveedores.controlador.php';
require_once '../modelos/proveedores.modelo.php';

class ajaxProveedores{
     /*=============================================
	EDITAR PROVEEDORES
    =============================================*/	

    public $idProveedores;

 public function ajaxEditarProveedores(){
        $item="id_proveedor";
        $valor=$this->idProveedores;
        $respuesta=ControladorProveedores::crtMostrarProveedores($item,$valor);
        echo json_encode($respuesta);


    }
      /*=============================================
	ACTIVAR Proveedor
    =============================================*/	
    public $activarId;
    public $activarProveedor;

    public function ajaxActivarProveedor(){
        $tabla="proveedores";
        $item1="estado";
        $estado= $this->activarProveedor;
        $item2='id_proveedor';

        $id_user=$this->activarId;

        $respuesta=ModelosProveedores::ActivarProveedor($tabla, $item1, $estado, $item2,$id_user);
    }


}


/*EDITAR PROVEEDORES*/
if(isset($_POST['idProveedores'])){
    return $_POST['idProveedores'];
    
     /*$editar= new ajaxCategoria;
    $editar-> IdCategoria= $_POST['idCategoria'];
     $editar->ajaxEditarCategorias();*/
}
switch ($_GET['op']) {
    case 'editar':
        $id = $_GET['id_user'];
        /*EDITAR USUARIOS*/
        if(isset($id)){
            $editar= new ajaxProveedores;
            $editar->idProveedores= $id;
            $editar->ajaxEditarProveedores();
        }
    break;
    case 'activar':
    $id = $_GET['id_user'];
    $estado= $_GET['estado'];
    activar($id,$estado);
break;

}


/*=============================================
ACTIVAR MARCA
=============================================*/

function activar($id,$estado){
    $activarProveedor= new ajaxProveedores;
    $activarProveedor-> activarProveedor=$estado;
    $activarProveedor-> activarId= $id;
    $activarProveedor-> ajaxActivarProveedor();

}