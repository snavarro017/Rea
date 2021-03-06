<?php
/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Tienerol_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tienerol by nombreUsuario
     */
    public function get_tienerol($nombreUsuario, $params=array())
    {
        if (count($params)>0) {
            $params["nombreUsuario"]=$nombreUsuario;
            $rolActual=$this->db->get_where('tieneRol', $params)->row_array();
        } else {
            $rolActual=$this->db->get_where('tieneRol', array('nombreUsuario'=>$nombreUsuario,'fechaFin'=>null))->row_array();
        }
        return $rolActual;
    }
        
    /*
     * Get all tienerol
     */
    public function get_all_tienerol()
    {
        $this->db->order_by('nombreUsuario', 'desc');
        return $this->db->get('tieneRol')->result_array();
    }
        
    /*
     * function to add new tienerol
     */
    public function add_tienerol($params)
    {
        return $this->db->insert('tieneRol', $params);
       // return $this->db->insert_id();
    }
    
    /*
     * function to update tienerol
     */
    public function update_tienerol($params=array(), $where=array())
    {  foreach ($where as $key=>$value) {
      $this->db->where($key, $value);
  }
        return $this->db->update('tieneRol', $params);

    }
    
    /*
     * function to delete tienerol
     */
    public function delete_tienerol($where)
    {
        return $this->db->delete('tieneRol', $where);
    }
}
