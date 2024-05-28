<?php
class HomeModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE estado=1";
        return $this->selectAll($sql);
    }

    public function getNuevosProductos()
    {
        $sql = "SELECT * FROM productos WHERE estado=1 ORDER BY id DESC LIMIT 5";
        return $this->selectAll($sql);
    }
}
