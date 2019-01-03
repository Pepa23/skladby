<?php

class Administrace extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function prihlaseni() {
		if ($this->ion_auth->logged_in()) {
			redirect('administrace');
		}
		else  {
			$data["main"] = "frontend/prihlaseni";
			$data["title"] = "Přihlášení do administrace";
			$this->layout->generate($data);
		}
    }
    
    public function zpracovaniPrihlaseni() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $return = $this->ion_auth->login($username, $password);
        
        if($return) {
            redirect('administrace');
        }
        
        else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">Špatné uživatelské jméno nebo heslo</div>');
            redirect('prihlaseni');
        }
    }
    
    public function odhlasit(){        
	$logout = $this->ion_auth->logout();

	$this->session->set_flashdata('message', $this->ion_auth->messages());
	redirect('', 'refresh');
    }
}
