<?php

class Terapija extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Terapija_model');
        $this->load->model('Vezba_model');
    } 

    function index() {
        $data['terapija'] = $this->Terapija_model->get_all_terapija();
        
        $data['_view'] = 'terapija/index';
        $this->load->view('layouts/main',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('LEKARPACIJENT','LEKARPACIJENT','required');
		$this->form_validation->set_rules('VEZBAID','VEZBAID','required');
		$this->form_validation->set_rules('TERAPIJADATUM','TERAPIJADATUM','required');
		
		if($this->form_validation->run()) {   
            $params = array(
				'LEKARPACIJENT' => $this->input->post('LEKARPACIJENT'),
				'VEZBAID' => $this->input->post('VEZBAID'),
				'TERAPIJADATUM' => $this->input->post('TERAPIJADATUM'),
				'RADKOMENTAR' => $this->input->post('RADKOMENTAR'),
                'UPUTSTVO' => $this->input->post('UPUTSTVO')
            );
            
            $terapija_id = $this->Terapija_model->add_terapija($params);
            redirect('terapija/index');
        } else {            
            $data['_view'] = 'terapija/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function dodajTerapijuPacijentu() {
        $idLekarPacijent = $this->uri->segment(3);
        $data['istorijaTerapija'] = $this->Terapija_model->istorijaTerapija($idLekarPacijent);
        $data['vezbe'] = $this->Vezba_model->get_all_vezba();
        $data['idLekarPacijent'] = $idLekarPacijent;
        $data['_view'] = 'terapija/istorijaTerapija';
        $this->load->view('layouts/main',$data);
    }

    function dodajTerapiju() {
        $params = array(
            'LEKARPACIJENT' => $this->input->post('idLekarPacijent'),
            'VEZBAID' => $this->input->post('VEZBAID'),
            'TERAPIJADATUM' => $this->input->post('TERAPIJADATUM'),
            'RADKOMENTAR' => "",
            'UPUTSTVO' => $this->input->post('editor1')
        );
            
        $terapija_id = $this->Terapija_model->add_terapija($params);
        redirect('terapija/dodajTerapijuPacijentu/'.$this->input->post('idLekarPacijent'));
    }

    function edit($TERAPIJAID) {   

        $data['terapija'] = $this->Terapija_model->get_terapija($TERAPIJAID);
        
        if(isset($data['terapija']['TERAPIJAID'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('LEKARPACIJENT','LEKARPACIJENT','required');
			$this->form_validation->set_rules('VEZBAID','VEZBAID','required');
			$this->form_validation->set_rules('TERAPIJADATUM','TERAPIJADATUM','required');
            $this->form_validation->set_rules('editor1', 'UPUTSTVO', 'required');
		
			if($this->form_validation->run()) {   
                $params = array(
					'LEKARPACIJENT' => $this->input->post('LEKARPACIJENT'),
					'VEZBAID' => $this->input->post('VEZBAID'),
					'TERAPIJADATUM' => $this->input->post('TERAPIJADATUM'),
					'RADKOMENTAR' => $this->input->post('RADKOMENTAR'),
                    'UPUTSTVO' => $this->input->post('editor1'),
                );

                $this->Terapija_model->update_terapija($TERAPIJAID,$params);            
                redirect('terapija/index');
            } else {
                $data['_view'] = 'terapija/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The terapija you are trying to edit does not exist.');
    } 

    function remove($TERAPIJAID) {
        $terapija = $this->Terapija_model->get_terapija($TERAPIJAID);

        if(isset($terapija['TERAPIJAID'])) {
            $this->Terapija_model->delete_terapija($TERAPIJAID);
            redirect('terapija/index');
        } else
            show_error('The terapija you are trying to delete does not exist.');
    }
    
}