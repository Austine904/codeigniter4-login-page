<?php

namespace App\Controllers;

use App\Models\userModel;


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

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post'){

            //validation
            $rules = [
                'firstname' => 'required|min_length[3]|max_lengh[50]',
                'lastname' => 'required|min_length[3]|max_lengh[50]',
                'email' => 'required|min_length[6]|max_lengh[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',


            ];

            if (! $this->validate($rules)){
                $data['validation'] = $this->validator;

            }else{
                //store user data to db
                $model = new UserModel();
                
                $newData = [

                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success','Successful Registration');
                return redirect()->to('/');
            }

        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }
}
