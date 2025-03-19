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
        echo view('login');
        echo view('templates/footer');
    }

    public function register(){
        $data = [];
        helper(['form']);
        
        if($this->request->getMethod() =='post'){

            //validation
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
}
