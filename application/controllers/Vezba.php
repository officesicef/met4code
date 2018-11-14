<?php

class Vezba extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Vezba_model');
    } 

    function index() {
        $data['vezba'] = $this->Vezba_model->get_all_vezba();
        
        $data['_view'] = 'vezba/index';
        $this->load->view('layouts/main',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('VEZBANAZIV','VEZBANAZIV','required');
		$this->form_validation->set_rules('VEZBAOPIS','VEZBAOPIS','required');
		
		if ($this->form_validation->run()) {   
            $params = array(
				'VEZBANAZIV' => $this->input->post('VEZBANAZIV'),
				'VEZBAOPIS' => $this->input->post('VEZBAOPIS'),
            );
            
            $vezba_id = $this->Vezba_model->add_vezba($params);
            redirect('vezba/index');
        } else {            
            $data['_view'] = 'vezba/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($VEZBAID) {   

        $data['vezba'] = $this->Vezba_model->get_vezba($VEZBAID);
        
        if (isset($data['vezba']['VEZBAID'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('VEZBANAZIV','VEZBANAZIV','required');
			$this->form_validation->set_rules('VEZBAOPIS','VEZBAOPIS','required');
		
			if ($this->form_validation->run()) {   
                $params = array(
					'VEZBANAZIV' => $this->input->post('VEZBANAZIV'),
					'VEZBAOPIS' => $this->input->post('VEZBAOPIS'),
                );

                $this->Vezba_model->update_vezba($VEZBAID,$params);            
                redirect('vezba/index');
            } else {
                $data['_view'] = 'vezba/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The vezba you are trying to edit does not exist.');
    } 

    function remove($VEZBAID) {
        $vezba = $this->Vezba_model->get_vezba($VEZBAID);

        if (isset($vezba['VEZBAID'])) {
            $this->Vezba_model->delete_vezba($VEZBAID);
            redirect('vezba/index');
        } else
            show_error('The vezba you are trying to delete does not exist.');
    }
    
}
