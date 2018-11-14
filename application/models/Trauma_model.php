<?php

class Trauma_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function get_trauma($TRAUMAID) {
        return $this->db->get_where('TRAUMA',array('TRAUMAID'=>$TRAUMAID))->row_array();
    }

    function get_all_trauma() {
        $this->db->order_by('TRAUMAID', 'desc');
        return $this->db->get('TRAUMA')->result_array();
    }

    function add_trauma($params) {
        $this->db->insert('TRAUMA',$params);
        return $this->db->insert_id();
    }

    function update_trauma($TRAUMAID,$params) {
        $this->db->where('TRAUMAID',$TRAUMAID);
        return $this->db->update('TRAUMA',$params);
    }

    function delete_trauma($TRAUMAID) {
        return $this->db->delete('TRAUMA',array('TRAUMAID'=>$TRAUMAID));
    }

    function get_trauma_name($TRAUMAID) {
        $this->db->select('TRAUMANAZIV');
        $this->db->from('trauma');
        $this->db->where('TRAUMAID=', $TRAUMAID);
        $query = $this->db->get();

        $data = null;
        foreach ($query->result() as $row) {
          $data[] = $row;
        }
            
        return $data[0]->TRAUMANAZIV;
    }
}
