<?php

class Trauma extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Trauma_model');
    } 

    function index() {
        $data['trauma'] = $this->Trauma_model->get_all_trauma();
        
        $data['_view'] = 'trauma/index';
        $this->load->view('layouts/main',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('TRAUMANAZIV','TRAUMANAZIV','required');
		$this->form_validation->set_rules('TRAUMAOPIS','TRAUMAOPIS','required');
		
		if($this->form_validation->run()) {   
            $params = array(
				'TRAUMANAZIV' => $this->input->post('TRAUMANAZIV'),
				'TRAUMAOPIS' => $this->input->post('TRAUMAOPIS'),
            );
            
            $trauma_id = $this->Trauma_model->add_trauma($params);
            redirect('trauma/index');
        } else {            
            $data['_view'] = 'trauma/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($TRAUMAID) {   

        $data['trauma'] = $this->Trauma_model->get_trauma($TRAUMAID);
        
        if (isset($data['trauma']['TRAUMAID'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('TRAUMANAZIV','TRAUMANAZIV','required');
			$this->form_validation->set_rules('TRAUMAOPIS','TRAUMAOPIS','required');
		
			if ($this->form_validation->run()) {   
                $params = array(
					'TRAUMANAZIV' => $this->input->post('TRAUMANAZIV'),
					'TRAUMAOPIS' => $this->input->post('TRAUMAOPIS'),
                );

                $this->Trauma_model->update_trauma($TRAUMAID,$params);            
                redirect('trauma/index');
            } else {
                $data['_view'] = 'trauma/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The trauma you are trying to edit does not exist.');
    } 

    function remove($TRAUMAID) {
        $trauma = $this->Trauma_model->get_trauma($TRAUMAID);

        if (isset($trauma['TRAUMAID'])) {
            $this->Trauma_model->delete_trauma($TRAUMAID);
            redirect('trauma/index');
        } else
            show_error('The trauma you are trying to delete does not exist.');
    }
    
}
