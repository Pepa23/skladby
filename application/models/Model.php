<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Josef
 */
class Model extends CI_Model {
      
    public function __construct(){
        parent::__construct();
    }
    
    public function ziskejAutory() {
        $this->db->select('id_autora, jmeno, obrazek, aktivni');
        $this->db->from('autor');
        $this->db->where('aktivni', 0);
        $this->db->order_by('jmeno', 'ASC');
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejVsechnyAutory() {
        $this->db->select('id_autora, jmeno, obrazek, aktivni');
        $this->db->from('autor');
        $this->db->order_by('jmeno', 'ASC');
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejAlba() {
        $this->db->select('id_alba, nazev, album.obrazek, autor_id_autora, album.aktivni, autor.jmeno as jmeno_autora, autor.obrazek as obrazek_autora', FALSE);
        $this->db->from('album');
        $this->db->join('autor', 'autor.id_autora=album.autor_id_autora', 'inner');
        $this->db->where('album.aktivni', 0);
        $this->db->order_by('nazev', 'ASC');
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejSkladby(){
        $this->db->select('id_skladby, skladba.nazev, skladba.aktivni, album_id_alba, album.nazev as nazev_alba, album.autor_id_autora, autor.jmeno as jmeno_autora', FALSE);
        $this->db->from('skladba');
        $this->db->join('album', 'album.id_alba=skladba.album_id_alba', 'inner');
        $this->db->join('autor', 'autor.id_autora=album.autor_id_autora', 'inner');
        $this->db->where('skladba.aktivni', 0);
        $this->db->order_by('nazev', 'ASC');
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejAutora($idAutora){
        $this->db->select('id_autora, jmeno, obrazek, popis, aktivni');
        $this->db->from('autor');
        $this->db->where('id_autora', $idAutora);
        //$this->db->where('aktivni', 0);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejAlbaAutora($idAutora){
        $this->db->select('id_alba, nazev, obrazek, autor_id_autora, aktivni', FALSE);
        $this->db->from('album');
        $this->db->where('autor_id_autora', $idAutora);
        $this->db->where('aktivni', 0);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejVsechnaAlbaAutora($idAutora){
        $this->db->select('id_alba, nazev, obrazek, autor_id_autora, aktivni', FALSE);
        $this->db->from('album');
        $this->db->where('autor_id_autora', $idAutora);
        
        $data = $this->db->get()->result();
        return $data;
    }

    public function ziskejAlbum($idAlba) {
        $this->db->select('id_alba, nazev, album.obrazek, album.aktivni, autor_id_autora, autor.jmeno as jmeno_autora', FALSE);
        $this->db->from('album');
        $this->db->join('autor', 'autor.id_autora=album.autor_id_autora', 'inner');
        $this->db->where('id_alba', $idAlba);
        $this->db->where('album.aktivni', 0);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejSkladbyAlba($idAlba) {
        $this->db->select('id_skladby, nazev, cas, album_id_alba, aktivni', FALSE);
        $this->db->from('skladba');
        $this->db->where('album_id_alba', $idAlba);
        $this->db->where('aktivni', 0);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejVsechnySkladbyAlba($idAlba) {
        $this->db->select('id_skladby, nazev, cas, album_id_alba, aktivni', FALSE);
        $this->db->from('skladba');
        $this->db->where('album_id_alba', $idAlba);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function ziskejSkladbu($idSkladby){
        $this->db->select('id_skladby, nazev, cas, album_id_alba, aktivni');
        $this->db->from('skladba');
        $this->db->where('id_skladby', $idSkladby);
        //$this->db->where('aktivni', 0);
        
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function pridejAutora($jmeno, $obrazek) {
        $data = array(
            'jmeno' => $jmeno,
            'obrazek' => $obrazek,
            'aktivni' => 0,
        );
        
        $this->db->insert('autor', $data);
    }
    
    public function editujAutora($idAutora, $jmeno, $obrazek){
        $data = array(
            'jmeno' => $jmeno,
            'obrazek' => $obrazek
        );
        
        $this->db->where('id_autora', $idAutora);
        $this->db->update('autor', $data);
    }
    
    public function smazAutora($idAutora) {
        $data = array(
            'aktivni' => 1,
        );
        
        $this->db->where('id_autora', $idAutora);
        $this->db->update('autor', $data);
    }
    
    public function pridejAlbum($nazev, $obrazek, $idAutora) {
        $data = array(
            'nazev' => $nazev,
            'obrazek' => $obrazek,
            'autor_id_autora' => $idAutora,
            'aktivni' => 0,
        );
        
        $this->db->insert('album', $data);
    }
    
    public function editujAlbum($idAlba, $nazev, $obrazek){
        $data = array(
            'nazev' => $nazev,
            'obrazek' => $obrazek
        );
        
        $this->db->where('id_alba', $idAlba);
        $this->db->update('album', $data);
    }
    
    public function smazAlbum($idAlba) {
        $data = array(
            'aktivni' => 1,
        );
        
        $this->db->where('id_alba', $idAlba);
        $this->db->update('album', $data);
    }
    
    public function aktivujAlbum($idAlba) {
        $data = array(
            'aktivni' => 0,
        );
        
        $this->db->where('id_alba', $idAlba);
        $this->db->update('album', $data);
    }
    
    public function pridejSkladbu($nazev, $cas, $idAlba) {
        $data = array(
            'nazev' => $nazev,
            'cas' => $cas,
            'album_id_alba' => $idAlba,
            'aktivni' => 0,
        );
        
        $this->db->insert('skladba', $data);
    }
    
    public function editujSkladbu($idSkladby, $nazev, $cas){
        $data = array(
            'nazev' => $nazev,
            'cas' => $cas
        );
        
        $this->db->where('id_skladby', $idSkladby);
        $this->db->update('skladba', $data);
    }
    
    public function deaktivujSkladbu($idSkladba) {
        $data = array(
            'aktivni' => 1,
        );
        
        $this->db->where('id_skladby', $idSkladba);
        $this->db->update('skladba', $data);
    }
    
    public function aktivujSkladbu($idSkladba) {
        $data = array(
            'aktivni' => 0,
        );
        
        $this->db->where('id_skladby', $idSkladba);
        $this->db->update('skladba', $data);
    }
}