<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Usuario_model extends CI_Model
{
    public function __construct()
        {
        parent::__construct();
       
    }
    function get_all_usuario_count()
    {   $this->db->from('usuario');
        $this->db->join("tenerestadousuario","tenerestadousuario.nombreUsuario=usuario.nombreUsuario");
        $this->db->join("tienerol","tienerol.nombreUsuario=usuario.nombreUsuario");
        $results=$this->db->where(array('tienerol.nombreRol'=>'profesor','tenerestadousuario.fechaFin'=>null,'tienerol.fechaFin'=>null)); 
        return ($this->db->count_all_results());
    }
    /*
     * Get usuario by nombreUsuario
     */
    public function get_usuario($nombreUsuario="", $params=array())
    {$this->db->join("tenerestadousuario","tenerestadousuario.nombreUsuario=usuario.nombreUsuario");
        $this->db->join("tienerol","tienerol.nombreUsuario=usuario.nombreUsuario");
        $this->db->order_by('usuario.nombreUsuario', 'desc');
        if (count($params)>0 && $nombreUsuario!="") {
            $params['usuario.nombreUsuario']=$nombreUsuario;
            $params["tenerestadousuario.fechaFin"]=null;
            $params["tienerol.fechaFin"]=null;
            $user=$this->db->get_where('usuario', $params)->row_array();
        } elseif($nombreUsuario=="") {
            $params["tenerestadousuario.fechaFin"]=null;
            $params["tienerol.fechaFin"]=null;
            $user=$this->db->get_where('usuario', $params)->row_array();
        }else{
            $user= $this->db->get_where('usuario', array('usuario.nombreUsuario'=>$nombreUsuario,'tenerestadousuario.fechaFin'=>null,'tienerol.fechaFin'=>null))->row_array();
           
        }
       
        return $user;
    }
        
    /*
     * Get all usuario
     */
    function get_all_usuario($params = array())
    {   $this->db->join("tenerestadousuario","tenerestadousuario.nombreUsuario=usuario.nombreUsuario");
        $this->db->join("tienerol","tienerol.nombreUsuario=usuario.nombreUsuario");
        $this->db->order_by('usuario.nombreUsuario', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
            $this->db->where(array('tienerol.nombreRol'=>'profesor'));
        }
       return $this->db->get_where('usuario',array('tenerestadousuario.fechaFin'=>null,'tienerol.fechaFin'=>null))->result_array();
       // return $this->db->get('usuario')->result_array();
    }
    /*
     * function to add new usuario
     */
    public function add_usuario($params)
    {
        if (!$this->db->insert('usuario', $params)) {
            $return= false;
        } else {
            $return= true;
        }
        return $return;
    }
    
    /*
     * function to update usuario
     */
    public function update_usuario($nombreUsuario, $params)
    {
        $this->db->where('nombreUsuario', $nombreUsuario);
        
        return $this->db->update('usuario', $params);
        
    }
    
    /*
	 *Esta funcion da de baja la cuenta del usuario
     */
    public function darBaja_usuario($nombreUsuario)
    {
		if($nombreUsuario){
			$resp=$this->db->get('usuario', array('nombreUsuario'=>$nombreUsuario));

		}else{
			echo "Error intente luego";
		}
        return $resp;
	}
	/** busca un usuario */
}
