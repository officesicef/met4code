<?php

class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('Dashboard_model');
        
    }

    function index() {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }

    function login() {
    	$data['_view'] = 'login';
        $this->load->view('layouts/main',$data);
    }

    function startSession() {
		if ($this->session->userdata('username') != '') {
			$this->session->userdata('username');
			$this->index();
		}
	}

	function logout() {
		if($this->session->userdata('username') != '') {
			$this->session->unset_userdata("username");
            $this->session->unset_userdata("role");
			$this->index();
		} else {
			$this->index();
		}
	}

    function user_validation() {
    	$this->form_validation->set_rules('username', 'Korisničko ime', 'required');
		$this->form_validation->set_rules('password', 'Lozinka', 'required');

		if ($this->form_validation->run()) {
			$username = $this->input->post("username");
			$password = $this->input->post("password");

			if ($this->Dashboard_model->check_users($username, $password)) {

				$session = array(
					'username' => $username,
					'user_id' => $this->Dashboard_model->get_id_by_username($username),
                    'role' => $this->Dashboard_model->get_role_by_username($username)
				);

				$this->session->set_userdata($session);
				$this->startSession();
			} else {
				$this->session->set_flashdata("error", "Korisničko ime ili lozinka nisu ispravni");
				$this->login();
			}
		} else {
			$this->login();
		}
    }

    function register() {
    	$data['_view'] = 'register';
        $this->load->view('layouts/main',$data);
    }

    function register_user() {
		$this->form_validation->set_rules('username', '"Korisničko ime"', 'required');
		$this->form_validation->set_rules('email', '"Email adresa"', 'required|valid_email');
		$this->form_validation->set_rules('password', '"Lozinka"', 'required');

		if ($this->form_validation->run()) {
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			if (!$this->Dashboard_model->check_user($username)) {
				if ($this->Dashboard_model->register_user($username, $email, $password)) {
					$this->session->set_flashdata("success", "Uspešna registracija");
					$this->login();
				} else {
					$this->session->set_flashdata("error", "Uneti podaci nisu ispravni");
					$this->register();
				}
			} else {
				$this->session->set_flashdata("error", "Korisničko ime već postoji");
				$this->register();
			}
		} else {
			$this->register();
		}
	}
}
