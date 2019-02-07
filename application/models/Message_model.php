<?php

class Message_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * @param int $id
     */
    public function setMessage(int $id): void
    {
        $data = [
            'email' => $this->input->post('email'),
            'theme' => $this->input->post('theme'),
            'text' => $this->input->post('text'),
            'userId' => $id,
        ];

        $this->db->insert('message', $data);
    }
}