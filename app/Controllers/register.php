<?php
namespace App\Controllers;

use App\Models\UserRegisterModel;

class register extends BaseController
{
    public function index()
    {
        return view('register');
    }
    public function store()
    {
        $validate = \Config\Services::validation();
        $validate->setRules([
            'nama'=> 'required|min_length[3]',
            'email'=> 'required|valid_email',
            'password'=> 'required|min_length[8]',
            'agreement'=> 'required',
        ]);

        if ($validate->withRequest($this->request)->run()){
            $email = $this->request->getVar('email');
            $nama = $this->request->getVar('nama');
            $password = $this->request->getVar('password');
            
            $data = [
                'email' => $email,
                'nama' => $nama,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ];

            $registerModel = new UserRegisterModel();
            $registerModel->insert($data);

            return redirect()->to(base_url('/login'));
        }else{
            return redirect()->back()->withInput()->with('errors', $validate->getErrors());
        }
    }
}