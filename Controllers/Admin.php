<?php
class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if (!empty( $_SESSION['nombre_usuario'])) {
            header('location: '. BASE_URL. 'admin/home' );
            exit;
        }
        $data['title'] = 'Acceso al sistema';
        $this->views->getView('admin', "loginAdmin", $data);
    }
    public function validar()
    {
        if (isset($_POST['email']) && isset($_POST['clave'])) {
            if (empty($_POST['email']) || empty($_POST['clave'])) {
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                $data = $this->model->getUsuario($_POST['email']);
                if (empty($data)) {
                    $respuesta = array('msg' => 'El correo no existe', 'icono' => 'warning');
                } else {
                    if (password_verify($_POST['clave'], $data['clave'])) {
                        $_SESSION['email'] = $data['correo'];
                        $_SESSION['nombre_usuario'] = $data['nombres'];
                        $respuesta = array('msg' => 'Datos correctos', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Contraseña incorrecta', 'icono' => 'warning');
                    }
                }
            }
        } else {
            $respuesta = array('msg' => 'Error desconocido', 'icono' => 'error');
        }
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function home ()
    {
        if (empty( $_SESSION['nombre_usuario'])) {
            header('location: '. BASE_URL. 'admin' );
            exit;
        }
        $data['title'] = 'Panel Administrativo';
        $data['pendientes']= $this->model->getTotales(1);
        $data['procesos']= $this->model->getTotales(2);
        $data['finalizados']= $this->model->getTotales(3);
        $data['productos']= $this->model->getProductos();
        $this->views->getView('admin/administracion', "indexAdmin", $data);
    }
    public function productosMinimos ()
    {
        if (empty( $_SESSION['nombre_usuario'])) {
            header('location: '. BASE_URL. 'admin' );
            exit;
        }
        $data = $this->model->productosMinimos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function topProductos ()
    {
        if (empty( $_SESSION['nombre_usuario'])) {
            header('location: '. BASE_URL. 'admin' );
            exit;
        }
        $data = $this->model->topProductos();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    
    public function salir (){
        session_destroy();
        header('Location: '. BASE_URL);
    }
}
