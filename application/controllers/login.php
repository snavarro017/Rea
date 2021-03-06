<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
           parent::__construct();

        $this->load->library('session');
        if (!isset($this->session->iniciada)) {
            $this->session->set_userdata(['iniciada'=>false]);
           
        }
    }
    public function index()
    {
        if ($this->input->post('nombreUsuario') && $this->input->post('clave')) {
            $existe = $this->Usuario_model->get_usuario($this->input->post('nombreUsuario'), array("usuario.clave" => hash('sha224', $this->input->post('clave'))));
            if (!is_null($existe)) {
                $verEstado = $this->TenerEstadoUsuario_model->get_tenerEstadoUsuario($this->input->post('nombreUsuario'));
                $verEstado["nombreEstadoUsuario"]=strtolower($verEstado["nombreEstadoUsuario"]);
                if ($verEstado["nombreEstadoUsuario"] != "alta") {
                    $mensaje = '<div class="alert alert-info text-center"><h4>'."El usuario se encuentra en estado ".$verEstado["nombreEstadoUsuario"].'</h4></div>';
                    $this->load->view("header",["title"=>"Login"]);
                    $this->load->view('logeo/login',["mensaje" => $mensaje]);
                    $this->load->view("footer");
    
				}else{
                    $this->cargarSession($existe);

					/** HACER FUNCIONAR LA VISTA INICIO */
					if(strtolower($this->session->rol) == 'administrador de usuarios') {
						redirect('Usuario/index');
					}elseif(strtolower($this->session->rol) == 'administrador de recursos'){
						
						redirect('Recurso/index');
					}else{
                    	
                	   redirect('inicio');
						
					}
				}
            } else {
                $mensaje = '<div class="alert alert-danger text-center"><h4>'."Usuario o Contraseña incorrectos".'</h4></div>';
                $this->load->view("header",["title"=>"Login"]);
                $this->load->view('logeo/login',["mensaje" => $mensaje]);
                $this->load->view("footer");

            }
        } else {
            $this->load->view("header", ["title" => "Login"]);
            $this->load->view('logeo/login');
            $this->load->view("footer");
        }  
	}
	
    public function cerrarSession()
    {
        $this->session->sess_destroy();
        redirect('login');
	}
	
    private function cargarSession($user)
    {
        $rol = $this->Tienerol_model->get_tienerol($this->input->post('nombreUsuario'));
        $permisos = array();
        $petPermisos = $this->Contienepermiso_model->get_all_contienepermiso(array("nombreRol" => $rol["nombreRol"]));
        foreach ($petPermisos as $permiso) {
            $permisos[] = strtolower($permiso["aliasPermiso"]);
        }
        $datos=array(
        'nombre'=>$user["nombre"],
        'apellido'=> $user["apellido"],
        'dni'=>$user["dni"],
        'email'=> $user["email"],
        'estudio'=> $user["estudio"],
        'nombreUsuario'=>$this->input->post('nombreUsuario'),
        'clave'=>$this->input->post('clave'),
        'permisos'=>$permisos,
        'rol'=>strtolower($rol['nombreRol']),
        'iniciada'=>true,
        'foto'=>$user["foto"]
        );
         $this->session->set_userdata($datos);
    }
}
