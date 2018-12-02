<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Poseenivel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get poseenivel by idRecurso
     */
    function get_poseenivel($idRecurso)
    {
        return $this->db->get_where('poseeNivel',array('idRecurso'=>$idRecurso))->row_array();
    }
    
    /*
     * Get all poseenivel count
     */
    function get_all_poseenivel_count()
    {
        $this->db->from('poseeNivel');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all poseenivel
     */
    function get_all_poseenivel($params = array())
    {
        $this->db->order_by('idRecurso', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('poseeNivel')->result_array();
    }
        
    /*
     * function to add new poseenivel
     */
    function add_poseenivel($params)
    {
        $this->db->insert('poseeNivel',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update poseenivel
     */
    function update_poseenivel($idRecurso,$params)
    {
        $this->db->where('idRecurso',$idRecurso);
        return $this->db->update('poseeNivel',$params);
    }
    
    /*
     * function to delete poseenivel
     */
    function delete_poseenivel($idRecurso)
    {
        return $this->db->delete('poseeNivel',array('idRecurso'=>$idRecurso));
    }
}