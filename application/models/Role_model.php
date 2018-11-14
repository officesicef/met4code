<?php

class Role_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function get_role($ROLEID) {
        return $this->db->get_where('ROLE',array('ROLEID'=>$ROLEID))->row_array();
    }

    function get_all_role() {
        $this->db->order_by('ROLEID', 'desc');
        return $this->db->get('ROLE')->result_array();
    }
        
    function add_role($params) {
        $this->db->insert('ROLE',$params);
        return $this->db->insert_id();
    }
    
    function update_role($ROLEID,$params) {
        $this->db->where('ROLEID',$ROLEID);
        return $this->db->update('ROLE',$params);
    }
    
    function delete_role($ROLEID) {
        return $this->db->delete('ROLE',array('ROLEID'=>$ROLEID));
    }
}
