<?php

class Lekarpacijent extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Lekarpacijent_model');
        $this->load->model('Korisnik_model');
        $this->load->model('Trauma_model');
    } 

    function index() {
        $data['lekarpacijent'] = $this->Lekarpacijent_model->get_all_lekarpacijent();
        $data['_view'] = 'lekarpacijent/index';
        $this->load->view('lekarpacijent/index',$data);
    }

    function add() {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('KORISNIKPACIJENTID','KORISNIKPACIJENTID','required');
		$this->form_validation->set_rules('TRAUMAID','TRAUMAID','required');
		$this->form_validation->set_rules('KORISNIKLEKARID','KORISNIKLEKARID','required');
		
        $this->send_voucher();

		if($this->form_validation->run())     
        {   
            $params = array(
				'ZAVRSENO' => $this->input->post('ZAVRSENO'),
				'KORISNIKPACIJENTID' => $this->input->post('KORISNIKPACIJENTID'),
				'TRAUMAID' => $this->input->post('TRAUMAID'),
				'KORISNIKLEKARID' => $this->input->post('KORISNIKLEKARID'),
            );
            
            $lekarpacijent_id = $this->Lekarpacijent_model->add_lekarpacijent($params);
            redirect('lekarpacijent/index');
        }
        else
        {            
            $data['_view'] = 'lekarpacijent/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function inicializujProgram() {   
        $params = array(
            'ZAVRSENO' => 0,
            'KORISNIKPACIJENTID' => $this->session->userdata('user_id'),
            'TRAUMAID' => $this->input->post('TRAUMAID'),
            'KORISNIKLEKARID' => $this->input->post('KORISNIKLEKARID'),
        );
            
        $lekarpacijent_id = $this->Lekarpacijent_model->add_lekarpacijent($params);
        $data['programi'] = $this->Lekarpacijent_model->sviProgramiPacijenta($this->session->userdata('user_id'));
        $data['_view'] = 'lekarpacijent/pregledprograma';
        $this->load->view('layouts/main',$data);
    } 

    function pregledPacijenata() {
        $data['pacijenti'] = $this->Lekarpacijent_model->sviPacijentiZaLekara($this->session->userdata('user_id'));
        $data['_view'] = 'lekarpacijent/pacijentiLekara';
        $this->load->view('layouts/main',$data);
    }

    function edit($LEKARPACIJENT) {   

        $data['lekarpacijent'] = $this->Lekarpacijent_model->get_lekarpacijent($LEKARPACIJENT);
        
        if(isset($data['lekarpacijent']['LEKARPACIJENT'])) {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('KORISNIKPACIJENTID','KORISNIKPACIJENTID','required');
			$this->form_validation->set_rules('TRAUMAID','TRAUMAID','required');
			$this->form_validation->set_rules('KORISNIKLEKARID','KORISNIKLEKARID','required');
		
			if($this->form_validation->run()) {   
                $params = array(
					'ZAVRSENO' => $this->input->post('ZAVRSENO'),
					'KORISNIKPACIJENTID' => $this->input->post('KORISNIKPACIJENTID'),
					'TRAUMAID' => $this->input->post('TRAUMAID'),
					'KORISNIKLEKARID' => $this->input->post('KORISNIKLEKARID'),
                );

                $this->Lekarpacijent_model->update_lekarpacijent($LEKARPACIJENT,$params);            
                redirect('lekarpacijent/index');
            } else {
                $data['_view'] = 'lekarpacijent/edit';
                $this->load->view('layouts/main',$data);
            }
        } else
            show_error('The lekarpacijent you are trying to edit does not exist.');
    } 

    function remove($LEKARPACIJENT) {
        $lekarpacijent = $this->Lekarpacijent_model->get_lekarpacijent($LEKARPACIJENT);

        if(isset($lekarpacijent['LEKARPACIJENT'])) {
            $this->Lekarpacijent_model->delete_lekarpacijent($LEKARPACIJENT);
            redirect('lekarpacijent/index');
        } else
            show_error('The lekarpacijent you are trying to delete does not exist.');
    }

    function zapocniProgram() {
        $data['traume'] = $this->Trauma_model->get_all_trauma();
        $data['doktori'] = $this->Korisnik_model->getAllDoctors();
        $data['lekarpacijent'] = $this->Lekarpacijent_model->get_all_lekarpacijent();
        
        $data['_view'] = 'lekarpacijent/zapocniProgram';
        $this->load->view('layouts/main',$data);
    }

    function send_voucher() {
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_timeout'] = 5;
        $config['smtp_crypto'] = 'tls';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'jobit320@gmail.com';
        $config['smtp_pass'] = 'Lozinka1';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        
        $this->load->library('email');
        $this->email->initialize($config);

        $this->email->clear(TRUE);

        $this->email->to("dejanstankovicmet@gmail.com");
        $this->email->from('jobit320@gmail.com', 'StepUp');
        $this->email->subject('Vaučer nagrada - čestitamo');
        $this->email->message('
            <div style="font-size: 16px;">
                <h6 style="float: left; width: 100%; overflow: hidden; position: relative; background: #e7eaf0;">
                    <span style="z-index: 1; float: left; background-color: #ffbe00;  width: auto; color: #fff; font-size: 20px; font-weight: bold; position: relative; line-height: normal;  text-transform: uppercase;  padding: 11px 35px 12px 20px;">Čestitamo - Osvojili ste vaučer</span>
                </h6>
                <div style="padding: 22px 30px 30px; border-style: solid; border-width: 0 1px 1px; border-color: #d7d8d8;">
                    <div style="padding: 0;">
                        <p>Dragi korisniče, <br><br>
                        Obaveštavamo Vas da ste uspešno završili program rehabilitacije.<br> 
                        Iskoristite sledeći kod:<b> '.$this->generateRandomString(10).'</b>
                        </p>
                        <span style="margin: 0; color: #ffbe00;">Datum izdavanja vaučera: '.date("Y.m.d").'.</span>
                    </div>
                </div>
            </div>
        ');
        
        $this->email->send();
    }

    function zavrsiTerapije() {
        $idLekarPacijent = $this->uri->segment(3);
        $params = array(
            'ZAVRSENO' => 1,
        );

        $this->Lekarpacijent_model->update_lekarpacijent($idLekarPacijent,$params);            
        $this->send_voucher();
        redirect('lekarpacijent/pregledPacijenata');
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function prikaziPrograme() {
        $data['programi'] = $this->Lekarpacijent_model->sviProgramiPacijenta($this->session->userdata('user_id'));
        $data['_view'] = 'lekarpacijent/pregledprograma';
        $this->load->view('layouts/main',$data);
    }

    function vezbe() {
        $idLekarPacijent = $this->uri->segment(3);
        $data['terapije'] = $this->Lekarpacijent_model->sveTerapijePacijenta($idLekarPacijent);
        $data['_view'] = 'lekarpacijent/pregledterapija';
        $this->load->view('layouts/main',$data);
    }
    
}
