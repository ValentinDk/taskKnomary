<?php

class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param int $id
     * @return object | null
     */
    public function getUser(int $id)
    {
        $query = $this->db->get_where('user', ['id' => $id]);
        $data = $query->row();

        return $data;
    }
}