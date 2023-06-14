<?php
namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use Psr\Log\LoggerInterface;

class dashboard extends BaseController
{
    protected $beforeFilters = ['dashboardfilter'];

    public function index()
    {
        // create if else statement to check if user is logged in
        // if logged in, show dashboard
        // else, redirect to login page
        // if (!session()->get('logged_in')) {
        // return redirect()->to(base_url('/login'))->with('errors', 'Anda harus login terlebih dahulu');
        // } else {
        $data['title'] = 'Dashboard';
        return view('dashboard/index', $data);
        // }
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