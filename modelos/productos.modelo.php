<?php

require_once 'conexion.php';

class modeloProductos{

    /*--======================================================
        GUARDAR PRODUCTOS
  =========================================================--  */

    static public function crearProductos($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla (imagen,codigo,descripcion,precio_venta,precio_compra,stock,stock_min,marca_id,categoria_id,subcategoria_id) VALUES (:imagen,:codigo,:descripcion,:precio_venta,:precio_compra,:stock,:stock_min,:marca_id,:categoria_id,:subcategoria_id)");
        
        $stmt->bindParam(":imagen", $datos['imagen'],PDO::PARAM_STR);  
        $stmt->bindParam(":descripcion", $datos['descripcion'],PDO::PARAM_STR);
         $stmt->bindParam(":codigo", $datos['codigo'],PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta", $datos['precio_venta'],PDO::PARAM_STR);
        $stmt->bindParam(":precio_compra", $datos['precio_compra'],PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos['stock'],PDO::PARAM_STR);
        $stmt->bindParam(":stock_min", $datos['stock_min'],PDO::PARAM_STR);
        $stmt->bindParam(":marca_id", $datos['marca_id'],PDO::PARAM_INT);
        $stmt->bindParam(":categoria_id", $datos['categoria_id'],PDO::PARAM_INT);
        $stmt->bindParam(":subcategoria_id", $datos['subcategoria_id'],PDO::PARAM_INT);
    

        if($stmt->execute()){

            return 'ok';

        }else{
            return $stmt->errorInfo();
        }

        $stmt->close();
        $stmt=null;
   

    }
  static  public function UlitmoCode(){
        $stmt=Conexion::conectar()->prepare("SELECT codigo FROM productos ORDER BY id_producto DESC limit 0,1");
        $stmt->execute();
        return $stmt->fetch();
        
    }
    static public function mdlmostrarProductos($tabla,$item,$valor){
         /*--======================================================
        EDITAR PRODUCTOS
  =========================================================--  */
        if($item != null){

            $stmt=Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item= '$valor'; ");
         $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();

        }else{
            /*--======================================================
        MOSTRAR TODOS LOS  PRODUCTOS
  =========================================================--  */

            $stmt1=Conexion::conectar()->prepare("SELECT 
            productos.`id_producto`,
            productos.`imagen`,
            productos.`descripcion`,
            productos.`codigo`,
            productos.`precio_venta`,
            productos.`precio_compra`,
            productos.`stock`,
            productos.`stock_min`,
            productos.`estado`,
            marcas.`nombre` AS 'nombre_marca',
            categorias.`nombre` AS 'nombre_categoria',
            subcategoria.`nombre` AS 'nombre_subcategoria'
            FROM $tabla
            INNER JOIN marcas ON productos.`marca_id`=marcas.`id_marca`
            INNER JOIN categorias ON productos.`categoria_id`=categorias.`id_categoria`
            INNER JOIN subcategoria ON productos.`subcategoria_id`=subcategoria.`id_subcategoria`;");
            $stmt1->execute();
            return $stmt1->fetchAll();
           
        }
    
        $stmt->close();
         $stmt=null;

    }
       /*--======================================================
        MOSTRAR PRODUCTOS MAS VENDIDOS
  =========================================================--  */

    static public function mdlMostrasProductosMasVendidos($tabla,$item,$precio_venta){
        if($item==null){
            $stmt=Conexion::conectar()->prepare("SELECT * FROM productos ORDER BY precio_venta DESC");
            $stmt->execute();
            return $stmt->fetchAll();

        }

    }


     /*--======================================================
        EDITAR  PRODUCTOS
  =========================================================--  */

    static public function editarProductos($tabla,$datos){
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET imagen = :imagen, descripcion = :descripcion, codigo = :codigo, precio_venta = :precio_venta, precio_compra = :precio_compra, stock = :stock, marca_id = :marca_id, categoria_id = :categoria_id, subcategoria_id = :subcategoria_id WHERE id_producto = :id_producto"); 

        $stmt->bindParam(":imagen", $datos['imagen'],PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos['descripcion'],PDO::PARAM_STR);
        $stmt->bindParam(":codigo", $datos['codigo'],PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta", $datos['precio_venta'],PDO::PARAM_STR);
        $stmt->bindParam(":precio_compra", $datos['precio_compra'],PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos['stock'],PDO::PARAM_STR);
        $stmt->bindParam(":marca_id", $datos['marca_id'],PDO::PARAM_INT);
        $stmt->bindParam(":categoria_id", $datos['categoria_id'],PDO::PARAM_INT);
        $stmt->bindParam(":subcategoria_id", $datos['subcategoria_id'],PDO::PARAM_INT);
        $stmt->bindParam(":id_producto", $datos['id_producto'],PDO::PARAM_INT);

    

        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error' ;
        }
    
      $stmt->close();
      $stmt= null;
      
      }


      static public function mdlActualizaProductoCategoria($tabla, $porcentaje, $categoria){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET precio_venta = precio_venta+(precio_venta*$porcentaje/100), precio_compra = precio_compra+(precio_compra*$porcentaje/100)  WHERE categoria_id = $categoria");


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
      }

      static public function mdlActualizaProductoSubCategoria($tabla, $porcentaje, $marca){
          $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET precio_venta = precio_venta+(precio_venta*$porcentaje/100), precio_compra = precio_compra+(precio_compra*$porcentaje/100) WHERE marca_id = $marca");
          if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;
      }

      
     /*--======================================================
        ACTIVAR PRODUCTOS
  =========================================================--  */

      static public function ActivarProductos($tabla, $item1, $estado, $item2,$id_user){
        $stmt= Conexion::conectar()->prepare("UPDATE $tabla SET estado= :estado WHERE id_producto = :id_producto");
        $stmt->bindParam(":estado",$estado,PDO::PARAM_STR);
        $stmt->bindParam(":id_producto",$id_user,PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return 'error';
        }
        
        $stmt->close();
        $stmt=null;
    }

    	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}


