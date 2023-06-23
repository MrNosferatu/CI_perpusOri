<?php
namespace App\Controllers;

use App\Models\anggotaModel;
use CodeIgniter\HTTP\Request;

class dashboard extends BaseController
{
    protected $beforeFilters = ['dashboardfilter'];

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
    }
    public function dashboard()
    {
        return view('dashboard/body');
    }
    public function admin()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/admin');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function buku()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/buku');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function kategori()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/kategori');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function anggota()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            $model = new AnggotaModel();
            $data['anggota'] = $model->getAnggota();
    
            return view('dashboard/anggota', $data);
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function peminjaman()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/peminjaman');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function pengembalian()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/pengembalian');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function inputAnggota()
    {

        $validate = \Config\Services::validation();
        $validate->setRules([
            'nama'=> 'required|min_length[3]',
            'email'=> 'required|valid_email',
        ]);

        if ($validate->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $email = $this->request->getPost('email');

            $data = [
                'email' => $email,
                'nama' => $nama,
            ];
            $anggotaModel = new anggotaModel();
            $anggotaModel->insert($data);
        } else {
            return redirect()->back()->withInput()->with('errors', $validate->getErrors());
        }
    }
}