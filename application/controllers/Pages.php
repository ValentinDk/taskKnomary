<?php

class Pages extends CI_Controller {

    public function view($page = 'home'): void
    {
        if (!file_exists('application/views/pages/'.$page.'.php')) {
            // Упс, у нас нет такой страницы!
            show_404();
        }

        $data['title'] = ucfirst($page); // Сделать первую букву заглавной

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}