<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Contienepermiso_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get contienepermiso by nombreRol
     */
    function get_contienepermiso($nombreRol)
    {
        return $this->db->get_where('contienePermiso',array('nombreRol'=>$nombreRol))->row_array();
    }
        
    /*
     * Get all contienepermiso
     */
    function get_all_contienepermiso($params=array())
    {
        if(count($params)>0){
            $this->db->order_by('nombreRol', 'desc');
           $result= $this->db->get_where('contienePermiso',$params)->result_array();
        }else{
            $result=$this->db->get('contienePermiso')->result_array();
        }
        
        return $result;
    }
        
    /*
     * function to add new contienepermiso
     */
    function add_contienepermiso($params)
    {
        $this->db->insert('contienePermiso',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update contienepermiso
     */
    function update_contienepermiso($nombreRol,$params)
    {
        $this->db->where('nombreRol',$nombreRol);
        return $this->db->update('contienePermiso',$params);
    }
    
    /*
     * function to delete contienepermiso
     */
    function delete_contienepermiso($nombreRol)
    {
        return $this->db->delete('contienePermiso',array('nombreRol'=>$nombreRol));
    }
}
