<?php

/*
 * Generated by CRUDigniter v3.2
 * www.crudigniter.com
 */
 
class Recurso_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get recurso by nombre
     */
    public function get_recurso($nombre)
    {
        return $this->db->get_where('recurso', array('nombre'=>$nombre))->row_array();
    }
        
    /*
     * Get all recurso
     */
    public function get_all_recurso($filters="")
    {
        $this->db->join('archivo', 'archivo.idRecurso = recurso.idRecurso');
        if ($filters!="") {
            $this->db->where($filters);
        }
        $this->db->order_by('recurso.idrecurso', 'desc');
        $recursos=$this->db->get('recurso')->result_array();
        return $recursos;
    }
    
    public function record_count()
    {
        return $this->db->count_all("recurso");
    }

    public function fetch_recurso($limit, $start, $filtros="")
    {   
        if ($filtros!="") {
            $this->db->distinct("r.idRecurso");
            $this->db->select("r.idRecurso,r.titulo as titulo,r.descripcion as recursoDesc,r.validado as validado,r.nombreUsuario as nombreUsuario,t.nombre as nombre,t.descripcion as temaDesc",false);
            $this->db->from("recurso as r");
            $this->db->join("tema as t", "t.idRecurso=r.idRecurso");
            $this->db->join("poseenivel as p", "p.idRecurso=r.idRecurso");
            $this->db->join("nivel as n", "n.nombre=p.nombreNivel");
            
            if (count($filtros["niveles"])>0) {
                $sql="";
                foreach ($filtros["niveles"] as $unNivel) {
                   $sql.="n.nombre="."\"".$unNivel."\""." or ";
                }
                $sql=substr($sql,0,strripos($sql,"or")-1);
                $this->db->where($sql);
            }
            if ($filtros["tema"]!="") {
                $this->db->where(array("t.nombre"=>$filtros["tema"]));
            }
                
            
        } else {
            $this->db->select("r.titulo as titulo,r.descripcion as recursoDesc,r.validado as validado,r.nombreUsuario as nombreUsuario",false);
            $this->db->from("recurso as r");
           
        }
        $this->db->limit($limit, $start);
        $query= $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        $arr=[];
        return $arr;
    }
        
    /*
     * function to add new recurso
     */
    public function add_recurso($params)
    {
        $this->db->insert('recurso', $params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update recurso
     */
    public function update_recurso($nombre, $params)
    {
        $this->db->where('nombre', $nombre);
        return $this->db->update('recurso', $params);
    }
    
    /*
     * function to delete recurso
     */
    public function delete_recurso($nombre)
    {
        return $this->db->delete('recurso', array('nombre'=>$nombre));
    }
}
