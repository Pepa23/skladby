<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Prihlaseny
 *
 * @author Josef
 */
class Prihlaseny extends Admin_Controller{
    
    function __construct() {
        parent::__construct();
        
        $this->layout->setLayout('layout/layout_administrace');
    }
    
    function zobrazUvodAdministrace(){
        $data["title"] = "Adminstrace";
        $data["main"] = "backend/administrace_uvod";
        
        $this->layout->generate($data);
    }
    
    function zobrazAutory() {
        $data["autori"] = $this->Model->ziskejVsechnyAutory();
        $data["title"] = "Seznam autorů";
        $data["main"] = "backend/seznam_autoru";
        
        $this->layout->generate($data);
    }
    
    function pridaniAutora() {
        $data["title"] = "Přidat autora";
        $data["main"] = "backend/pridani_autora";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniPridavaniAutora(){
        $jmeno = $this->input->post('jmeno');
        $obrazek = $this->input->post('obrazek');
        
        $this->Model->pridejAutora($jmeno, $obrazek);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Autor byl přidán!</div>');
        redirect('administrace/seznam-autoru/');
    }
            
    function editaceAutora($idAutora) {
        $data["autor"] = $this->Model->ziskejAutora($idAutora);
        $data["albaAutora"] = $this->Model->ziskejVsechnaAlbaAutora($idAutora);
        $data["title"] = "Editace autora";
        $data["main"] = "backend/editace_autora";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniEditaceAutora($idAutora) {
        $jmeno = $this->input->post('jmeno');
        $obrazek = $this->input->post('obrazek');
        
        $this->Model->editujAutora($idAutora, $jmeno, $obrazek);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Autor byl editován!</div>');
        redirect('administrace/seznam-autoru');
    }
    
    function smazaniAutora($idAutora) {
        $this->Model->smazAutora($idAutora);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Autor byl smazán!</div>');
        redirect('administrace/seznam-autoru');
    }
    
    function pridaniAlba($idAutora) {
        $data["autor"] = $this->Model->ziskejAutora($idAutora);
        $data["title"] = "Přidat album";
        $data["main"] = "backend/pridani_alba";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniPridavaniAlba() {
        $nazev = $this->input->post('nazev');
        $obrazek = $this->input->post('obrazek');
        $idAutora = $this->input->post('id_autora');
        
        $this->Model->pridejAlbum($nazev, $obrazek, $idAutora);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Album bylo přidáno!</div>');
        redirect('administrace/seznam-autoru');  
    }
    
    function editaceAlba($idAlba) {
        $data["album"] = $this->Model->ziskejAlbum($idAlba);
        $data["skladbyAlba"] = $this->Model->ziskejVsechnySkladbyAlba($idAlba);
        $data["title"] = "Editace alba";
        $data["main"] = "backend/editace_alba";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniEditaceAlba($idAlba) {
        $nazev = $this->input->post('nazev');
        $obrazek = $this->input->post('obrazek');
        $idAutora = $this->input->post('id_autora');
        
        $this->Model->editujAlbum($idAlba, $nazev, $obrazek);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Album bylo editováno!</div>');
        redirect('administrace/editace-autora/'.$idAutora);
    }
    
    function deaktivaceAlba($idAlba) {
        $album = $this->Model->ziskejAlbum($idAlba);
        
        $this->Model->smazAlbum($idAlba);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Album bylo deaktivováno!</div>');
        redirect('administrace/editace-autora/'.$album[0]->autor_id_autora);
    }
    
    function aktivaceAlba($idAlba) {
        $album = $this->Model->ziskejAlbum($idAlba);
        
        $this->Model->aktivujAlbum($idAlba);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Album bylo aktivováno!</div>');
        redirect('administrace/editace-autora/'.$album[0]->autor_id_autora);
    }
    
    function pridaniSkladby($idAlba) {
        $data["album"] = $this->Model->ziskejAlbum($idAlba);
        $data["title"] = "Přidat skladbu";
        $data["main"] = "backend/pridani_skladby";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniPridavaniSkladby() {
        $nazev = $this->input->post('nazev');
        $cas = $this->input->post('cas');
        $idAlba = $this->input->post('id_alba');
        
        $this->Model->pridejSkladbu($nazev, $cas, $idAlba);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Skladba byla přidána!</div>');
        redirect('administrace/editace-alba/'.$idAlba);  
    }
    
    function editaceSkladby($idSkladby) {
        $data["skladba"] = $this->Model->ziskejSkladbu($idSkladby);
        $data["title"] = "Editace skladby";
        $data["main"] = "backend/editace_skladby";
        
        $this->layout->generate($data);
    }
    
    function zpracovaniEditaceSkladby($idSkladby) {
        $nazev = $this->input->post('nazev');
        $cas = $this->input->post('cas');
        $idAlba = $this->input->post('id_alba');
        
        $this->Model->editujSkladbu($idSkladby, $nazev, $cas);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Skladba byla editována!</div>');
        redirect('administrace/editace-alba/'.$idAlba);
    }
    
    function deaktivaceSkladby($idSkladby) {
        $skladba = $this->Model->ziskejSkladbu($idSkladby);
        
        $this->Model->deaktivujSkladbu($idSkladby);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Skladba byla deaktivována!</div>');
        redirect('administrace/editace-alba/'.$skladba[0]->album_id_alba);
    }
    
    function aktivaceSkladby($idSkladby) {
        $skladba = $this->Model->ziskejSkladbu($idSkladby);
        
        $this->Model->aktivujSkladbu($idSkladby);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">Skladba byla aktivována!</div>');
        redirect('administrace/editace-alba/'.$skladba[0]->album_id_alba);
    }
}