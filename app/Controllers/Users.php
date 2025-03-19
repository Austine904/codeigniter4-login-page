<?php

namespace App\Controllers;

use SebastianBergmann\Template\Template;

class Users extends BaseController
{
    public function index()
    {
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer', $data);

    }
}
