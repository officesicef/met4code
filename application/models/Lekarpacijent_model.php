<?php
 
class Lekarpacijent_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function get_lekarpacijent($LEKARPACIJENT) {
        return $this->db->get_where('LEKARPACIJENT',array('LEKARPACIJENT'=>$LEKARPACIJENT))->row_array();
    }

    function get_all_lekarpacijent() {
        $this->db->order_by('LEKARPACIJENT', 'desc');
        return $this->db->get('LEKARPACIJENT')->result_array();
    }

    function add_lekarpacijent($params) {
        $this->db->insert('LEKARPACIJENT',$params);
        return $this->db->insert_id();
    }

    function update_lekarpacijent($LEKARPACIJENT,$params) {
        $this->db->where('LEKARPACIJENT',$LEKARPACIJENT);
        return $this->db->update('LEKARPACIJENT',$params);
    }
    
    function delete_lekarpacijent($LEKARPACIJENT) {
        return $this->db->delete('LEKARPACIJENT',array('LEKARPACIJENT'=>$LEKARPACIJENT));
    }

    function sviPacijentiZaLekara($idDoktor) {
        $query = $this->db->query("
            select * from lekarpacijent
            inner join korisnik on korisnik.KORISNIKID = LEKARPACIJENT.KORISNIKPACIJENTID
            inner join trauma on trauma.TRAUMAID = LEKARPACIJENT.TRAUMAID
            where lekarpacijent.KORISNIKLEKARID = " . $idDoktor
        );
        return $query->result();
    }

    function sviProgramiPacijenta($userId) {
        $query = $this->db->query("
            select * from lekarpacijent 
            inner join trauma on trauma.TRAUMAID = LEKARPACIJENT.TRAUMAID
            inner join korisnik on korisnik.KORISNIKID = lekarpacijent.KORISNIKLEKARID
            where lekarpacijent.KORISNIKPACIJENTID = " . $userId
        );
        return $query->result();
    }

    function sveTerapijePacijenta($userId) {
        $query = $this->db->query("
            select * from terapija inner join vezba on vezba.vezbaid = terapija.vezbaid where terapija.LEKARPACIJENT = ".$userId
        );
        return $query->result();
    }

}