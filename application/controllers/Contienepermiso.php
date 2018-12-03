<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Contienepermiso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contienepermiso_model');
        } 

    /*
     * Listing of contienepermiso
     */
    function index()
    {
        $data['contienepermiso'] = $this->Contienepermiso_model->get_all_contienepermiso();
        
        $data['_view'] = 'contienepermiso/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new contienepermiso
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
            );
            
            $contienepermiso_id = $this->Contienepermiso_model->add_contienepermiso($params);
            redirect('contienepermiso/index');
        }
        else
        {            
            $data['_view'] = 'contienepermiso/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a contienepermiso
     */
    function edit($nombreRol)
    {   
        // check if the contienepermiso exists before trying to edit it
        $data['contienepermiso'] = $this->Contienepermiso_model->get_contienepermiso($nombreRol);
        
        if(isset($data['contienepermiso']['nombreRol']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                );

                $this->Contienepermiso_model->update_contienepermiso($nombreRol,$params);            
                redirect('contienepermiso/index');
            }
            else
            {
                $data['_view'] = 'contienepermiso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The contienepermiso you are trying to edit does not exist.');
    } 

    /*
     * Deleting contienepermiso
     */
    function remove($nombreRol)
    {
        $contienepermiso = $this->Contienepermiso_model->get_contienepermiso($nombreRol);

        // check if the contienepermiso exists before trying to delete it
        if(isset($contienepermiso['nombreRol']))
        {
            $this->Contienepermiso_model->delete_contienepermiso($nombreRol);
            redirect('contienepermiso/index');
        }
        else
            show_error('The contienepermiso you are trying to delete does not exist.');
    }
    
}
