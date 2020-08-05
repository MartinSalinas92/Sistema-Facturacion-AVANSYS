<?php
require_once 'controlladores/plantilla.controlador.php';
require_once 'controlladores/usuarios.controlador.php';
require_once 'controlladores/proveedores.controlador.php';
require_once 'controlladores/categorias.controlador.php';
require_once 'controlladores/marcas.controlador.php';
require_once 'controlladores/compras.controlador.php';
require_once 'controlladores/productos.controlador.php';
require_once 'controlladores/clientes.controlador.php';
require_once 'controlladores/ventas.controlador.php';
require_once 'controlladores/devoluciones.controlador.php';
require_once 'controlladores/devolucionesstock.controlador.php';
require_once 'controlladores/variacion-precios.controlador.php';
require_once 'controlladores/motivo.controlador.php';
require_once 'controlladores/subcategoria.controlador.php';


require_once 'modelos/usuarios.modelo.php';
require_once 'modelos/proveedores.modelo.php';
require_once 'modelos/categorias.modelo.php';
require_once 'modelos/marcas.modelo.php';
require_once 'modelos/compras.modelo.php';
require_once 'modelos/productos.modelo.php';
require_once 'modelos/clientes.modelo.php';
require_once 'modelos/ventas.modelo.php';
require_once 'modelos/devoluciones.modelo.php';
require_once 'modelos/devolucionesstock.modelo.php';
require_once 'modelos/variacion-precios.modelo.php';
require_once 'modelos/motivo.modelo.php';
require_once 'modelos/subcategoria.modelo.php';

$plantilla= new ControladorPlantilla();
$plantilla->ctrPlantilla();