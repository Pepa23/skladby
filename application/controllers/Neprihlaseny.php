<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Neprihlaseny
 *
 * @author Josef
 */
class Neprihlaseny extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function zobrazUvod(){        
        $data["title"] = "Skladby";
        $data["main"] = "frontend/uvod";

        $this->layout->generate($data);
    }
    
    public function zobrazAutory(){
        $data["autori"] = $this->Model->ziskejAutory();
        $data["title"] = "Seznam autorů";
        $data["main"] = "frontend/autori";
        
        $this->layout->generate($data);
    }
    
    public function zobrazAlba(){
        $data["alba"] = $this->Model->ziskejAlba();
        $data["title"] = "Seznam alb";
        $data["main"] = "frontend/alba";
        
        $this->layout->generate($data);
    }
    
    public function zobrazSkladby(){
        $data["skladby"] = $this->Model->ziskejSkladby();
        $data["title"] = "Seznam skladeb";
        $data["main"] = "frontend/skladby";
        
        $this->layout->generate($data);
    }
    
    public function zobrazAutora($idAutora){
        $data["autor"] = $this->Model->ziskejAutora($idAutora);
        $data["albaAutora"] = $this->Model->ziskejAlbaAutora($idAutora);
        $data["title"] = "Autor";
        $data["main"] = "frontend/autor";
        
        $this->layout->generate($data);
    }
    
    public function zobrazAlbum($idAlba){
        $data["album"] = $this->Model->ziskejAlbum($idAlba);
        $data["skladbyAlba"] = $this->Model->ziskejSkladbyAlba($idAlba);
        $data["title"] = "Album";
        $data["main"] = "frontend/album";
        
        $this->layout->generate($data);
    }
    
}
