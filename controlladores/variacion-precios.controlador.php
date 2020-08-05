<?php  

class VariacionesPrecios{

    static public function MostrarVariaciones(){

        $tabla='variacion_precio';

        $respuesta=ModeloVariacion::mdlMostrarVariaciones($tabla);

        return $respuesta;

    }

}


?>