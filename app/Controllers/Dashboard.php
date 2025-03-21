<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
echo view('templates/header', $data);
echo view('Dashboard');
echo view('templates/footer');

