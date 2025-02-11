<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }


    //vista producto

    public function producto($page)
    {
        $data['perfil'] = 'no';
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 20;
        $desde = ($pagina - 1) * $porPagina;

        $data['title'] = 'tienda';
        $data['productos'] = $this->model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
        $this->views->getView('principal', "producto", $data);
    }

    //vista detalle producto

    public function detail($id_producto)

    {
        $data['perfil'] = 'no';
        $data['producto'] = $this->model->getProducto($id_producto);
        if (empty($data['producto'])) {
            echo 'Pagina no encontrada ';
            exit;
        }
        $id_categoria = $data['producto']['id_categoria'];
        $data['relacionados'] = $this->model->getAleatorios($id_categoria, $data['producto']['id']);
        
        //scanear galeria
        $result= array();
        $directorio= 'assets/img/productos/'.$id_producto;
        if (file_exists($directorio)) {
            $imagenes = scandir($directorio);
            if (false !== $imagenes) {
                foreach ($imagenes as $key => $file) {
                    if ('.'!= $file && '..' != $file) {
                        array_push($result,$file);
                    }
                }
            }
        }
        $data['imagenes']= $result;


        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detail", $data);
    }
    //vista categoria 
    public function categorias($datos)

    {
        $data['perfil'] = 'no';
        $id_categoria = 1;
        $page = 1;
        $array = explode(',', $datos);
        if (isset($array[0])) {
            if (!empty($array[0])) {
                $id_categoria = $array[0];
            }
        }
        if (isset($array[1])) {
            if (!empty($array[1])) {
                $page = $array[1];
            }
        }


        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 15;
        $desde = ($pagina - 1) * $porPagina;


        $data['pagina'] = $pagina;
        $total = $this->model->getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);


        $data['productos'] = $this->model->getProductosCat($id_categoria, $desde, $porPagina);
        $data['title'] = 'categorias';
        $data['id_categoria'] = $id_categoria;

        $this->views->getView('principal', "categorias", $data);
    }

    // VISTA LISTA DE DESEOS


    public function deseo($id_producto)

    {
        $data['perfil'] = 'no';
        $data['title'] = 'tu lista de deseos';

        $this->views->getView('principal', "deseo", $data);
    }


    //obtener productos a partir de la lista carrito

    public function listaProductos()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $array['productos'] = array();
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $producto) {
                $result = $this->model->getProducto($producto['idProducto']);
                $data['id'] = $result['id'];
                $data['nombre'] = $result['nombre'];
                $data['precio'] = $result['precio'];
                $data['cantidad'] = $producto['cantidad'];
                $data['imagen'] = $result['imagen'];
                $subTotal = $result['precio'] * $producto['cantidad'];
                $data['subTotal'] = number_format($subTotal, 2);
                array_push($array['productos'], $data);
                $total += $subTotal;
            }
        }

        $array['total'] = number_format($total, 2);
        $array['totalPaypal'] = ($total);

        $array['moneda'] = MONEDA;
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function carrito()
    {
        $data['perfil'] = 'no';
        $data['title'] = 'Carrito ';
        $this->views->getView('principal', "carrito", $data);
    }

    public function iniciar()
    {
        $data['title'] = 'iniciar ';
        $this->views->getView('principal', "iniciar", $data);
    }
    public function registrar()
    {
        $data['title'] = 'registrar ';
        $this->views->getView('principal', "registrar", $data);
    }

    public function nosotros()
    {
        $data['title'] = 'nosotros ';
        $this->views->getView('principal', "nosotros", $data);
    }

    public function PF()
    {
        $data['title'] = 'PF ';
        $this->views->getView('principal', "PF", $data);
    }
    public function Pyp()
    {
        $data['title'] = 'Pyp ';
        $this->views->getView('principal', "Pyp", $data);
    }
    public function TyC()
    {
        $data['title'] = 'TyC ';
        $this->views->getView('principal', "TyC", $data);
    }

    public function busqueda($valor)
    {
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function recupera()
    {
        $data['title'] = 'Recuperar contraseña ';
        $this->views->getView('principal', "recupera", $data);
    }
    
}
