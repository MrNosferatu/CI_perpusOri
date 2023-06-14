<?php
namespace App\Controllers;

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
        }    }
    public function kategori()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/kategori');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }    }
    public function anggota()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/anggota');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }    }
    public function peminjaman()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/peminjaman');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }    }
    public function pengembalian()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            return view('dashboard/pengembalian');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }    }
}