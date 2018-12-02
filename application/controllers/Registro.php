<?php
class Registro extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
    function index(){
        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'clave' => hash('sha224', $this->input->post('clave')),
                'dni' => $this->input->post('dni'),
                'apellido' => $this->input->post('apellido'),
                'nombre' => $this->input->post('nombre'),
                'domicilio' => $this->input->post('domicilio'),
                'email' => $this->input->post('email'),
                'nombreUsuario' => $this->input->post('nombreUsuario'),
            );
            $insercion = $this->Usuario_model->add_usuario($params);
            if ($insercion) {
                $fecha = (getdate()["year"]) . "-" . (getdate()["mon"]) . "-" . (getdate()["mday"]);
                $hora = (getdate()["hours"]) . ":" . (getdate()["minutes"]) . ":" . (getdate()["seconds"]);
                $nombreEstadoUsuario = "pendiente";
                $nombreRol="Profesor";
                $nombreUsuario = $params["nombreUsuario"];
                $datosEstado = array("fechaInicio"=>$fecha,"hora"=>$hora,"nombreUsuario"=>$nombreUsuario,"nombreEstadoUsuario"=>$nombreEstadoUsuario);
                $datosRol=array("fechaInicio"=>$fecha,"nombreUsuario"=>$nombreUsuario,"nombreRol"=>$nombreRol);
                $insercionEstado = $this->TenerEstadoUsuario_model->add_tenerEstadoUsuario($datosEstado);
                $insercionProfesor = $this->Tienerol_model->add_tienerol($datosRol);
                $this->load->view("header", ["title" => "Registro"]);
                $this->load->view('logeo/registrarse', array("mensaje" => '<div class="alert alert-success text-center"><h4>'."Se ah registrado correctamente espere a que un administrador valide su cuenta".'</h4></div>'));
                $this->load->view("footer");
            } else {
                $this->load->view("header", ["title" => "Registro"]);
                $this->load->view('logeo/registrarse', array("mensaje" => '<div class="alert alert-info text-center"><h4>'."El usuario ya existe".'</h4></div>'));
                $this->load->view("footer");
            }
            // redirect('usuario/index');
        } else {
            $this->load->view("header", ["title" => "Registro","scripts"=>["validacion.js"]]);
            $this->load->view('logeo/registrarse');
            $this->load->view("footer");
        }
    }
}


?>