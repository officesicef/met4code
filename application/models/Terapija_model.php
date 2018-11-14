<?php
 
class Terapija_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_terapija($TERAPIJAID) {
        return $this->db->get_where('TERAPIJA',array('TERAPIJAID'=>$TERAPIJAID))->row_array();
    }
        
    function get_all_terapija() {
        $this->db->order_by('TERAPIJAID', 'desc');
        return $this->db->get('TERAPIJA')->result_array();
    }
        
    function add_terapija($params) {
        $this->db->insert('TERAPIJA',$params);
        return $this->db->insert_id();
    }

    function update_terapija($TERAPIJAID,$params) {
        $this->db->where('TERAPIJAID',$TERAPIJAID);
        return $this->db->update('TERAPIJA',$params);
    }

    function delete_terapija($TERAPIJAID) {
        return $this->db->delete('TERAPIJA',array('TERAPIJAID'=>$TERAPIJAID));
    }

    function istorijaTerapija($param) {
        $query = $this->db->query("SELECT * FROM lekarPacijent inner join terapija on lekarPacijent.lekarPacijent = terapija.lekarPacijent inner join vezba on vezba.vezbaid = terapija.vezbaid where terapija.lekarPacijent = " . $param);
        return $query->result();
    }

}
