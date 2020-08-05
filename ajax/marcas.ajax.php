<?php
require_once '../controlladores/marcas.controlador.php';
require_once '../modelos/marcas.modelo.php';


class ajaxMarca{
     /*=============================================
	EDITAR Marca
    =============================================*/	

    public $IdMarca;

 public function ajaxEditarMarcas(){
        $item="id_marca";
        $valor=$this->IdMarca;
        $respuesta=ControladorMarcas::crtmostrarMarcas($item,$valor);
        echo json_encode($respuesta);


    }
        /*=============================================
	ACTIVAR Marca
    =============================================*/	
    public $activarId;
    public $activarMarca;

    public function ajaxActivarMarcas(){
        $tabla="marcas";
        $item1="estado";
        $estado= $this->activarMarca;
        $item2='id_marca';
        $id_user=$this->activarId;

        $respuesta=MoledoMarca::ActivarMarca($tabla, $item1, $estado, $item2,$id_user);

    }
    

}


/*EDITAR USUARIOS*/
if(isset($_POST['idMarca'])){
    return $_POST['idMarca'];
    
     /*$editar= new ajaxCategoria;
    $editar-> IdCategoria= $_POST['idCategoria'];
     $editar->ajaxEditarCategorias();*/
}
switch ($_GET['op']) {
    case 'editar':
        $id = $_GET['id_user'];
        /*EDITAR USUARIOS*/
        if(isset($id)){
            $editar= new ajaxMarca;
            $editar->IdMarca= $id;
            $editar->ajaxEditarMarcas();
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
    $activarMarca= new ajaxMarca;
    $activarMarca-> activarMarca=$estado;
    $activarMarca-> activarId= $id;
    $activarMarca-> ajaxActivarMarcas();

}

?>