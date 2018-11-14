<?php

class Korisnik extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Korisnik_model');
    } 

    function index() {
        $data['korisnik'] = $this->Korisnik_model->get_all_korisnik();
        
        $data['_view'] = 'korisnik/index';
        $this->load->view('layouts/main',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('ROLEID','ROLEID','required');
		$this->form_validation->set_rules('USERNAME','USERNAME','required');
		$this->form_validation->set_rules('PASSWORD','PASSWORD','required');
		$this->form_validation->set_rules('EMAIL','EMAIL','required');
		
		if($this->form_validation->run()) {   
            $params = array(
				'PASSWORD' => $this->input->post('PASSWORD'),
				'ROLEID' => $this->input->post('ROLEID'),
				'USERNAME' => $this->input->post('USERNAME'),
				'EMAIL' => $this->input->post('EMAIL'),
            );
            
            $korisnik_id = $this->Korisnik_model->add_korisnik($params);
            redirect('korisnik/index');
        } else {            
            $data['_view'] = 'korisnik/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($KORISNIKID) {   
        $data['korisnik'] = $this->Korisnik_model->get_korisnik($KORISNIKID);
        
        if(isset($data['korisnik']['KORISNIKID'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('ROLEID','ROLEID','required');
			$this->form_validation->set_rules('USERNAME','USERNAME','required');
			$this->form_validation->set_rules('PASSWORD','PASSWORD','required');
			$this->form_validation->set_rules('EMAIL','EMAIL','required');
		
			if($this->form_validation->run()) {   
                $params = array(
					'PASSWORD' => $this->input->post('PASSWORD'),
					'ROLEID' => $this->input->post('ROLEID'),
					'USERNAME' => $this->input->post('USERNAME'),
					'EMAIL' => $this->input->post('EMAIL'),
                );

                $this->Korisnik_model->update_korisnik($KORISNIKID,$params);            
                redirect('korisnik/index');
            } else {
                $data['_view'] = 'korisnik/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The korisnik you are trying to edit does not exist.');
    } 

    function remove($KORISNIKID) {
        $korisnik = $this->Korisnik_model->get_korisnik($KORISNIKID);

        if(isset($korisnik['KORISNIKID'])) {
            $this->Korisnik_model->delete_korisnik($KORISNIKID);
            redirect('korisnik/index');
        } else
            show_error('The korisnik you are trying to delete does not exist.');
    }
    
}
