<?php
class ventas
{
    //Atributos
    public $conexion;
    //Constructor
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    //Metodos

    public function consulta()
    {
        $con = "SELECT * FROM ventas ORDER BY Productos, Cantidad, Referencia";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }

    public function eliminar($id)
    {
        $del = "DELETE FROM ventas WHERE id_ventas = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La infor,acion ha sido eliminada";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO ventas(Productos, Cantidad, Referencia) VALUES('$params->Productos', '$params->Cantidad', '$params->Referencia')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE ventas SET Productos = '$params->Productos', Cantidad = '$params->Cantidad', Referencia = '$params->Referencia' WHERE id_ventas = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM ventas WHERE Productos LIKE '%$valor%' OR Cantidad LIKE '%$valor%' OR Referencia LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
?>