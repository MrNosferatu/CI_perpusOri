<?php
namespace App\Controllers;

use App\Models\UserModel;

class login extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function authenticate()
    {
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (!$user){
            return $this->response->setStatusCode(404)->setJSON(['message' => 'User tidak ditemukan']);

            // return redirect()->to('/login')->with('error', 'Email tidak ditemukan');
        }
        if (!password_verify($password, $user['password'])){
            return $this->response->setStatusCode(404)->setJSON(['message' => 'Password Salah']);
            // return redirect()->to('/login')->with('error', 'Password salah!');setStatusCode
        }
        session()->set([
            'user_id' => $user['id'],
            'email' => $user['email'],
            'logged_in' => true
        ]);
        return redirect()->to(base_url('/dashboard'));
    }
}