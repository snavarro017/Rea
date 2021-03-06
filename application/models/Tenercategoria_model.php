<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tenercategoria_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tenercategoria by nombreTema
     */
    function get_tenercategoria($nombreTema,$nombreCat)
    {
        return $this->db->get_where('tenerCategoria',array('nombreTema'=>$nombreTema,'nombreCategoria'=>$nombreCat))->row_array();
    }
    
    /*
     * Get all tenercategoria count
     */
    function get_all_tenercategoria_count()
    {
        $this->db->from('tenerCategoria');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tenercategoria
     */
    function get_all_tenercategoria($params = array())
    {
        $this->db->order_by('nombreTema', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tenerCategoria')->result_array();
    }
        
    /*
     * function to add new tenercategoria
     */
    function add_tenercategoria($params)
    {
        $this->db->insert('tenerCategoria',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tenercategoria
     */
    function update_tenercategoria($nombreTema,$nombreCategoria,$params)
    {
        $this->db->where('nombreTema',$nombreTema);
        $this->db->where('nombreCategoria',$nombreCategoria);
        return $this->db->update('tenerCategoria',$params);
    }
    
    /*
     * function to delete tenercategoria
     */
    function delete_tenercategoria($nombreTema)
    {
        return $this->db->delete('tenerCategoria',array('nombreTema'=>$nombreTema));
    }
}
