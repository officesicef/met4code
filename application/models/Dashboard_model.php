<?php

class Dashboard_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function check_users($username, $password) {
        $this->db->select('*');
        $this->db->where("USERNAME", $username);
        $result = $this->db->get("korisnik");

        if ($result->num_rows() > 0) {

            if ($result) {
                $this->db->select("PASSWORD");
                $this->db->where("USERNAME", $username);
                $query = $this->db->get("korisnik");

                foreach ($query->result() as $row) {
                    $data[] = $row;
                }

                foreach ($data as $key) {
                    if ($key->PASSWORD == sha1($password)) {
                        $this->db->where("USERNAME", $username);
                        $this->db->where("PASSWORD", $key->PASSWORD);
                        $query = $this->db->get("korisnik");

                        if ($query->num_rows() == 1) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }

        } else {
            return false;
        }
    }

    function register_user($username, $email, $password) {
        $params = array(
          'ROLEID' => 3,
          'USERNAME' => $username,
          'EMAIL' => $email,
          'PASSWORD' => sha1($password)
        );

        $this->db->insert('korisnik', $params);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function check_user($username) {
        $this->db->select('EMAIL');
        $this->db->where("USERNAME", $username);
        $query = $this->db->get("korisnik");
        foreach ($query->result() as $row) {
          $data[] = $row;
        }

        if ($query->num_rows() > 0) {
            return $data[0]->EMAIL;
        } else {
            return false;
        }
    }

    function get_id_by_username($username) {
        $this->db->select('KORISNIKID');
        $this->db->from('korisnik');
        $this->db->like('USERNAME', $username);
        $query = $this->db->get();

        $data = null;
        foreach ($query->result() as $row) {
          $data[] = $row;
        }
            
        return $data[0]->KORISNIKID;
    }

    function get_role_by_username($username) {
        $query = $this->db->query("select * from korisnik
          inner join role on korisnik.ROLEID = role.ROLEID
          where korisnik.USERNAME = " . "'" . $username . "'");
        return $query->result()[0]->ROLEID;
    }

}