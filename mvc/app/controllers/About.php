<?php

class About extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'About',
            'name' => 'Ridwan',
            'age' => 20,
            'job' => 'Programmer',
        ];
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $this->view('about/page');
    }
}
