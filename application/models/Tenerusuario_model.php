<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tenerusuario_model extends CI_Model
{
    function __construct()
    {$this->load->model("Estadousuario_model");
        parent::__construct();
    }
    
    /*
     * Get tenerusuario by hora
     */
    function get_tenerusuario($nombreUsuario,$fecha,$hora)
    {
        return $this->db->get_where('tenerUsuario',array('nombreUsuario'=>$nombreUsuario,'fecha'=>$fecha,'hora'=>$hora))->row_array();
    }
        
    /*
     * Get all tenerusuario
     */
    function get_all_tenerusuario()
    {
        $this->db->order_by('hora', 'desc');
        return $this->db->get('tenerUsuario')->result_array();
    }
        
    /*
     * function to add new tenerusuario
     */
    function add_tenerusuario($params)
    {
       return $this->db->insert('tenerUsuario',$params);
        //return $this->db->insert_id();
    }
    
    /*
     * function to update tenerusuario
     */
    function update_tenerusuario($hora,$fecha,$nombreUsuario,$params)
    {
        $this->db->where('hora',$hora);
        $this->db->where('fecha',$fecha);
        $this->db->where('nombreUsuario',$nombreUsuario);
        return $this->db->update('tenerUsuario',$params);
    }
    
    /*
     * function to delete tenerusuario
     */
    function delete_tenerusuario($hora)
    {
        return $this->db->delete('tenerUsuario',array('hora'=>$hora));
    }
}
