<?php

require_once '../controlladores/clientes.controlador.php';
require_once '../modelos/clientes.modelo.php';



class clientesAjax{

    public $idCliente;

    public function editarclientes($id){
        $item='persona_id';
        $valor= $id;
        $respuesta=ControladorClientes::ctrMostrarClientes($item,$valor);
        echo json_encode($respuesta);
    }

}

/*EDITAR CLIENTES*/

    switch ($_GET['op']) {
        case 'editar':
            $id=$_GET['id_user'];
            if(isset($id)){
                $editar= new clientesAjax;
                $editar->idCliente=$id;
                $editar->editarclientes($id);
            }
        break;
    }   

