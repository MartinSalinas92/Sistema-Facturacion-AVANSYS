<?php
require_once "../controlladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class ajaxusuarios{
    /*EDITAR USUARIOS*/

    public $idUsuario;

    public function ajaxEditarUsuarios(){
        $item="id_usuario";
        $valor=$this->idUsuario;
        $respuesta=ControladorUsuarios::mostrarUsuarios($item,$valor);
        echo json_encode($respuesta);
    }
    /*ACTIVAR USUARIOS*/
    public $activarId;
    public $activarUsuario;

    public function ajaxactivarUsuarios(){
        $tabla="usuarios";
        $item1="estado";
        $estado= $this->activarUsuario;
        $item2='id_usuario';
        $id_user=$this->activarId;

        $respuesta=ModelosUsuarios::activarUsuarios($tabla, $item1, $estado, $item2,$id_user);

    }
    /*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarUsuario;

	public function ajaxValidarUsuario(){

		$item = "usuario";
		$valor = $this->validarUsuario;

		$respuesta = ControladorUsuarios::mostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

}

/*EDITAR USUARIOS*/
if(isset($_POST['idUsuario'])){
    return $_POST['idUsuario'];
    // $editar= new ajaxusuarios;
    // $editar->idUsuario= $_POST['idUsuario'];
    // $editar->ajaxEditarUsuarios();
}
switch ($_GET['op']) {
    case 'editar':
        $id = $_GET['id_user'];
        /*EDITAR USUARIOS*/
        if(isset($id)){
            $editar= new ajaxusuarios;
            $editar->idUsuario= $id;
            $editar->ajaxEditarUsuarios();
        }
    break;
    case 'activar':
        $id = $_GET['id_user'];
        $estado= $_GET['estado'];
        activar($id,$estado);
    break;
    case 'validar':
        $usuario= $_GET['validarUsuario'];
        validar($usuario);
    break;
}

/*=============================================
ACTIVAR USUARIO
=============================================*/	
function activar($id,$estado){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $estado;
	$activarUsuario -> activarId = $id;
	$activarUsuario -> ajaxactivarUsuarios();

}


/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

function validar($usuario){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $usuario;
	$valUsuario -> ajaxValidarUsuario();

}
    

    /*
    $activar= new ajaxusuarios;
    $activar->activarUsuario=$_POST['activarUsuario'];
    $activar->activarId=$_POST['activarId'];
    $activa->ajaxactivarUsuarios();*/

?>