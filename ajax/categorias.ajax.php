<?php
require_once '../controlladores/categorias.controlador.php';
require_once '../modelos/categorias.modelo.php';


class ajaxCategoria{
     /*=============================================
	EDITAR CATEGORIA
    =============================================*/	

    public $IdCategoria;

 public function ajaxEditarCategorias(){
        $item="id_categoria";
        $valor=$this->IdCategoria;
        $respuesta=ControladorCategorias::mostrarCategorias($item,$valor);
        echo json_encode($respuesta);

    }
     /*ACTIVAR CATEGORIA*/
     public $activarId;
     public $activarCategoria;
 
     public function ajaxactivarCategoria(){
         $tabla="categorias";
         $item1="estado";
         $estado= $this->activarCategoria;
         $item2='id_categoria';
         $id_user=$this->activarId;
 
         $respuesta=ModeloCategorias::activarCategoria($tabla, $item1, $estado, $item2,$id_user);
 
     }
    

}


/*EDITAR USUARIOS*/
if(isset($_POST['idCategoria'])){
    return $_POST['idCategoria'];
    
     /*$editar= new ajaxCategoria;
    $editar-> IdCategoria= $_POST['idCategoria'];
     $editar->ajaxEditarCategorias();*/
}
switch ($_GET['op']) {
    case 'editar':
        $id = $_GET['id_user'];
        /*EDITAR USUARIOS*/
        if(isset($id)){
            $editar= new ajaxCategoria;
            $editar->IdCategoria= $id;
            $editar->ajaxEditarCategorias();
        }
    break;
    case 'activar':
    $id = $_GET['id_user'];
    $estado= $_GET['estado'];
    activar($id,$estado);
break;

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	
function activar($id,$estado){

	$activarCategoria = new ajaxCategoria();
	$activarCategoria -> activarCategoria = $estado;
	$activarCategoria -> activarId = $id;
	$activarCategoria-> ajaxactivarCategoria();

}

?>