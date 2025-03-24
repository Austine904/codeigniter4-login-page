<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Validation\UserRules;


use SebastianBergmann\Template\Template;

class Users extends BaseController
{
    public function login()
    {
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'POST') {

            //validation rules
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];
            $errors = [
                'password' => [
                    'validateUser' => 'Email and Password don\'t match'
                ]
            ];

            if (! $this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {

                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                if ($user) {
                    $this->setUserSession($user);
                    return redirect()->to('dashboard');
                } else {
                    session()->setFlashdata('error', 'Invalid email or password.');
                    return redirect()->to('<?= base_url() ?>/login');
                }


                // $this->setUserMethod($user);
                // return redirect()->to('dashboard');
            }
            
        }
        // $data['session'] = session();
        echo view('templates/header', $data);
        echo view('login'  );
        echo view('templates/footer');
    }



    private function setUserSession($user)
    {
        $data = [

            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedin' => true,

        ];
        session()->set($data);
        return true;
    }

    public function register()
    {

        $data = [];
        helper(['form']);


        if ($this->request->getMethod() == 'POST') {

            //validation rules
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[50]',
                'lastname' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];


            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                //store user data to db
                $model = new UserModel();

                $newData = [

                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];


                //user data db content test
                // print_r($newData);
                // exit();

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        }


        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }




    public function Dashboard()
    {
        $session = session();
        $data['session'] = $session;

        echo view('templates/header', $data);
        echo view('dashboard');
        echo view('templates/footer');
    }

    public function profile(){
        $data = [];
        helper(['form']);
        $model = new UserModel();

        if ($this->request->getMethod() == 'POST') {

                    //validation rules
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[50]',
                'lastname' => 'required|min_length[3]|max_length[50]',
            ];

            if($this->request->getPost('password') !=''){
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {

                //update user data to db
               

                $newData = [
                    'id' =>session()->get('id'),
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                 ];

                    if($this->request->getPost('password') !=''){
                        $newData['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

                    //  $newData['password'] = $this->request->getPost('password');
                    }

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Details Successfuly Updated!');
                return redirect()->to(base_url('/profile'));
            }
            
        }

        $data['user'] = $model->where('id', session()->get('id'))->first();
        echo view('templates/header', $data);
        echo view('profile');
        echo view('templates/footer');
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }
}
