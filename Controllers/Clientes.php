<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        if (empty($_SESSION['correoCliente'])) {
            header("Location: " . BASE_URL . "principal/iniciar");
        }
        $data['perfil'] = 'si';

        $data['title'] = 'Tu perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION['correoCliente']);

        $this->views->getView('principal', "perfil", $data);
    }

    //registro directo

    function registroDirecto()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $clave = $_POST['clave'];
        $token = md5($correo);
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $existe = $this->model->getVerificar($correo);
        if ($existe) {
            echo json_encode(['msg' => 'error al registrarse, el correo ya existe!', 'icono' => 'error'], JSON_UNESCAPED_UNICODE);
            die;
        }
        $data = $this->model->registroDirecto($nombre, $apellido, $correo, $hash, $token);
        if ($data > 0) {
            $status_correo = $this->enviarcorreo($correo, $token);
            $_SESSION['correoCliente'] = $correo;
            $_SESSION['nombreCliente'] = $nombre;
            $mensaje = array('msg' => 'registrado con exito, revisa tu correo', 'icono' => 'success', 'token' => $token, 'correo' => $status_correo);
        } else {
            $mensaje = array('msg' => 'error al registrarse', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    //enviar correo
    public function enviarCorreo($correo, $token)
    {

        if ($correo && $token) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = HOST_SMTP;                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = USER_SMTP;                     //SMTP username
                $mail->Password   = PASS_SMTP;                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = PUERTO_SMTP;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('juanjd54321@gmail.com', TITLE);
                $mail->addAddress($correo);

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mensaje desde la TIENDA:' . TITLE;
                $mail->Body    = 'Para verificar tu correo en nuestra tienda <a href="' . BASE_URL . 'clientes/verificarCorreo/' . $token . '">CLICK AQUI</a> ';
                $mail->AltBody = 'GRACIAS POR ELEGIRNOS';

                $mail->send();
                $mensaje = array('msg' => 'CORREO ENVIADO, REVISA TU BANDEJA DE ENTRADA - SPAM', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje = array('msg' => 'ERROR AL ENVIAR CORREO: ' . $mail->ErrorInfo, 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'ERROR FATAL: ', 'icono' => 'error');
        }
        return $mensaje;
    }

    //verificar correo
    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!$verificar) {
            header("Location: " . BASE_URL . "Clientes");
            die;
        }
        $this->model->actualizarVerify($verificar['id']);
        header("Location: " . BASE_URL . "Clientes");
    }



    //LOGIN DIRECTO

    function loginDirecto()
    {
        if (isset($_POST['correoLogin']) && isset($_POST['claveLogin'])) {
            if (empty($_POST['correoLogin']) || empty($_POST['claveLogin'])) {
                $mensaje = array("msg" => "AVISO", 'TODO LOS CAMPOS SON REQUERIDOS', 'warning');
            } else {
                $correo = $_POST['correoLogin'];
                $clave = $_POST['claveLogin'];
                $verificar = $this->model->getVerificar($correo);

                if (!empty($verificar)) {
                    if (password_verify($clave, $verificar['clave'])) {
                        $_SESSION['idCliente'] = $verificar['id'];
                        $_SESSION['correoCliente'] = $verificar['correo'];
                        $_SESSION['nombreCliente'] = $verificar['nombre'];
                        $mensaje = array('msg' => 'OK, redirigiendo...', 'icono' => 'success');
                    } else {
                        $mensaje = array('msg' => 'CONTRASEÑA INCORRECTA', 'icono' => 'error');
                    }
                } else {
                    $mensaje = array('msg' => 'EL CORREO NO EXISTE', 'icono' => 'error');
                }

                echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
                die();
            }
        }
    }

    //CERRAR SESION
    function cerrarSesion()
    {
        session_destroy();
        header("Location: " . BASE_URL);
        die;
    }

    //REGISTRAR PEDIDOS
    function registrarPedido()
    {
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $pedidos = $json['pedidos'];
        $productos = $json['productos'];
        if (is_array($pedidos) && is_array($productos)) {
            $id_transaccion = $pedidos['id'];
            $monto = $pedidos['purchase_units'][0]['amount']['value'];
            $estado = $pedidos['status'];
            $fecha = date('Y-m-d-H:i:s');
            $email = $pedidos['payer']['email_address'];
            $nombre = $pedidos['payer']['name']['given_name'];
            $apellido = $pedidos['payer']['name']['surname'];
            $direccion = $pedidos['purchase_units'][0]['shipping']['address']['address_line_1'];
            $ciudad = $pedidos['purchase_units'][0]['shipping']['address']['admin_area_2'];
            $id_cliente = $_SESSION['idCliente'];
            $data = $this->model->registrarPedido(
                $id_transaccion,
                $monto,
                $estado,
                $fecha,
                $email,
                $nombre,
                $apellido,
                $direccion,
                $ciudad,
                $id_cliente
            );
            if ($data > 0) {
                foreach ($productos as $producto) {
                    $temp = $this->model->getProducto($producto['idProducto']);
                    $this->model->registrarDetalle($temp['nombre'], $temp['precio'], $producto['cantidad'], $data, ($producto['idProducto']));
                }
                $mensaje = array('msg' => 'Pedido registrado', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al registrar el pedido', 'icono' => 'error');
            }
        } else {
            $mensaje = array('msg' => 'Error fatal con los datos', 'icono' => 'error');
        }
        echo json_encode($mensaje);
        die();
    }

    //LISTAR PRODUCTOS PENDIENTES
    public function listarPendientes()
    {
        $id_cliente = $_SESSION['idCliente'];
        $data = $this->model->getPedidos($id_cliente);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['accion'] = '<div class="text-center"><button class="btn btn-primary" type="button" onclick="verPedido(' . $data[$i]['id'] . ')"><i class="fas fa-eye"></i></button></div>';
        }
        echo json_encode($data);
        die();
    }

    public function verPedido($idPedido)
    {

        $data['pedido'] = $this->model->getPedido($idPedido);
        $data['productos'] = $this->model->verPedidos($idPedido);

        $data['moneda'] = MONEDA;
        echo json_encode($data);
        die();
    }
    public function listarProductos()
    {
        $id_cliente = $_SESSION['idCliente'];
        $data = $this->model->getProductos($id_cliente);
        for ($i = 0; $i < count($data); $i++) {
            $comprobar = $this ->model->comprobarCalificacion($data[$i]['id_producto'],$id_cliente);
            $total = (empty($comprobar)) ? 0 : $comprobar['cantidad'] ;
            $uno = ($total >= 1) ? 'text-warning' : 'star' ;
            $dos = ($total >= 2) ? 'text-warning' : 'star' ;
            $tres = ($total >= 3) ? 'text-warning' : 'star' ;
            $cuatro = ($total >= 4) ? 'text-warning' : 'star' ;
            $cinco = ($total == 5) ? 'text-warning' : 'star' ;

            $data[$i]['calificacion'] = ' <ul>
            <li class="calificacion">
                <span class=" '.$uno.'" onclick="agregarCalificacion(' . $data[$i]['id_producto'] . ' , 1)" ><i class="bi bi-star-fill"></i></span>
                <span class=" '.$dos.'" onclick="agregarCalificacion(' . $data[$i]['id_producto'] . ' , 2)"><i class="bi bi-star-fill"></i></span>
                <span class=" '.$tres.'" onclick="agregarCalificacion(' . $data[$i]['id_producto'] . ' , 3)"><i class="bi bi-star-fill"></i></span>
                <span class=" '.$cuatro.'" onclick="agregarCalificacion(' . $data[$i]['id_producto'] . ' , 4)" ><i class="bi bi-star-fill"></i></span>
                <span class=" '.$cinco.'"" onclick="agregarCalificacion(' . $data[$i]['id_producto'] . ' , 5)"><i class="bi bi-star-fill"></i></span>
            </li>
        </ul>';
        }
        echo json_encode($data);
        die();
    }
    public function agregarCalificacion()
    {
        $id_cliente = $_SESSION['idCliente'];
        $datos = file_get_contents('php://input');
        $json = json_decode($datos, true);
        $comprobar = $this->model->comprobarCalificacion($json['id_producto'], $id_cliente);
        if (empty($comprobar)) {
            $data = $this->model->agregarCalificacion($json['cantidad'], $json['id_producto'], $id_cliente);
            if ($data > 0) {
                $mensaje = array('msg' => 'Calificacion agregada', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'error al calificar', 'icono' => 'error');
            }
        } else {
            $data = $this->model->cambiarCalificacion($json['cantidad'], $json['id_producto'], $id_cliente);
            if ($data == 1) {
                $mensaje = array('msg' => 'Calificacion agregada', 'icono' => 'success');
            } else {
                $mensaje = array('msg' => 'error al calificar', 'icono' => 'error');
            }
        }
        echo json_encode($mensaje);
        die();
    }
}
