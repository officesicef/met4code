<?php

class Korisnik_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function get_korisnik($KORISNIKID) {
        return $this->db->get_where('KORISNIK',array('KORISNIKID'=>$KORISNIKID))->row_array();
    }

    function get_all_korisnik() {
        $this->db->order_by('KORISNIKID', 'desc');
        return $this->db->get('KORISNIK')->result_array();
    }

    function add_korisnik($params) {
        $this->db->insert('KORISNIK',$params);
        return $this->db->insert_id();
    }

    function update_korisnik($KORISNIKID,$params) {
        $this->db->where('KORISNIKID',$KORISNIKID);
        return $this->db->update('KORISNIK',$params);
    }

    function delete_korisnik($KORISNIKID) {
        return $this->db->delete('KORISNIK',array('KORISNIKID'=>$KORISNIKID));
    }

    function get_user_name($KORISNIKID) {
        $this->db->select('IME');
        $this->db->from('korisnik');
        $this->db->where('KORISNIKID=', $KORISNIKID);
        $query = $this->db->get();

        $data = null;
        foreach ($query->result() as $row) {
          $data[] = $row;
        }
            
        return $data[0]->IME;
    }

    function getAllDoctors() {
        $query = $this->db->query("SELECT korisnik.USERNAME, korisnik.KORISNIKID FROM KORISNIK INNER JOIN ROLE on ROLE.ROLEID = KORISNIK.ROLEID WHERE ROLE.ROLEID=2");
        return $query->result();
    }

}
