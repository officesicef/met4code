<?php

class Vezba_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_vezba($VEZBAID) {
        return $this->db->get_where('VEZBA',array('VEZBAID'=>$VEZBAID))->row_array();
    }

    function get_all_vezba() {
        $this->db->order_by('VEZBAID', 'desc');
        return $this->db->get('VEZBA')->result_array();
    }

    function add_vezba($params) {
        $this->db->insert('VEZBA',$params);
        return $this->db->insert_id();
    }
    
    function update_vezba($VEZBAID,$params) {
        $this->db->where('VEZBAID',$VEZBAID);
        return $this->db->update('VEZBA',$params);
    }
    
    function delete_vezba($VEZBAID) {
        return $this->db->delete('VEZBA',array('VEZBAID'=>$VEZBAID));
    }
}
