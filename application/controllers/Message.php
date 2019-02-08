<?php

class Message extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('message_model');
    }

    /**
     * @param int $id
     */
    public function index(int $id): void
    {
        $user = $this->users_model->getUser($id);

        if ($user != null && $user->auth == true) {
            $this->load->helper('form');
            $this->load->library('email');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('theme', 'Тема', 'required');
            $this->form_validation->set_rules('text', 'Текст', 'required|min_length[1]');

            if ($this->form_validation->run() === false) {
                $data = ['id' => $id];
                $this->load->view('message/sendMessage', $data);
            } else {
                $this->email->to($this->input->post('email'));
                $this->email->from('vall126kv3@mail.ru', 'Valentin');
                $this->email->subject($this->input->post('theme'));
                $this->email->message($this->input->post('text'));
                $this->email->send();

                $this->message_model->setMessage($id);

                $this->load->view('message/success');
            }
        } else {
            show_404();
        }
    }
}