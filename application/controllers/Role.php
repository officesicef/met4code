<?php

class Role extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Role_model');
    } 

    function index() {
        $data['role'] = $this->Role_model->get_all_role();
        
        $data['_view'] = 'role/index';
        $this->load->view('layouts/main',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('ROLENAZIV','ROLENAZIV','required');
		
		if($this->form_validation->run()) {   
            $params = array(
				'ROLENAZIV' => $this->input->post('ROLENAZIV'),
            );
            
            $role_id = $this->Role_model->add_role($params);
            redirect('role/index');
        } else {            
            $data['_view'] = 'role/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($ROLEID) {   

        $data['role'] = $this->Role_model->get_role($ROLEID);
        
        if(isset($data['role']['ROLEID'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('ROLENAZIV','ROLENAZIV','required');
		
			if($this->form_validation->run()) {   
                $params = array(
					'ROLENAZIV' => $this->input->post('ROLENAZIV'),
                );

                $this->Role_model->update_role($ROLEID,$params);            
                redirect('role/index');
            } else {
                $data['_view'] = 'role/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The role you are trying to edit does not exist.');
    } 

    function remove($ROLEID) {
        $role = $this->Role_model->get_role($ROLEID);

        if(isset($role['ROLEID'])) {
            $this->Role_model->delete_role($ROLEID);
            redirect('role/index');
        } else
            show_error('The role you are trying to delete does not exist.');
    }
    
}
