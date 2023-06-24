<?php
namespace App\Controllers;

use App\Models\anggotaModel;
use App\Models\bukuModel;
use App\Models\kategoriModel;
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
            $model = new bukuModel();
            $data['buku'] = $model->getBuku();
            // return view('dashboard/buku');
            return view('dashboard/buku')
                . view('dashboard/tabel_buku', $data);
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    public function kategori()
    {
        $request = service('request');
        if ($request->isAJAX()) {
            $model = new kategoriModel();
            $data['kategori'] = $model->getKategori();

            return view('dashboard/kategori')
                . view('dashboard/tabel_kategori', $data);
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

            // return view('dashboard/anggota', $data);
            return view('dashboard/anggota')
                . view('dashboard/tabel_anggota', $data);
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
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telepon' => 'required|min_length[12]|max_length[13]',
            'alamat' => 'required|max_length[255]',
        ]);

        if ($validate->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $email = $this->request->getPost('email');
            $alamat = $this->request->getPost('alamat');
            $telepon = $this->request->getPost('telepon');
            $data = [
                'email' => $email,
                'nama' => $nama,
                'alamat' => $alamat,
                'telepon' => $telepon,
            ];
            $anggotaModel = new anggotaModel();
            $anggotaModel->insert($data);
        } else {
            return redirect()->back()->withInput()->with('errors', $validate->getErrors());
        }
    }
    public function inputBuku()
    {
        $validate = \Config\Services::validation();
        $validate->setRules([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'sinopsis' => 'required',
        ]);

        if ($validate->withRequest($this->request)->run()) {
            $judul = $this->request->getPost('judul');
            $pengarang = $this->request->getPost('pengarang');
            $penerbit = $this->request->getPost('penerbit');
            $tahun_terbit = $this->request->getPost('tahun_terbit');
            $jumlah_halaman = $this->request->getPost('jumlah_halaman');
            $sinopsis = $this->request->getPost('sinopsis');
            $data = [
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun_terbit' => $tahun_terbit,
                'jumlah_halaman' => $jumlah_halaman,
                'sinopsis' => $sinopsis,
            ];
            $anggotaModel = new bukuModel();
            $anggotaModel->insert($data);
        } else {
            return redirect()->back()->withInput()->with('errors', $validate->getErrors());
        }
    }
    public function inputKategori()
    {
        $validate = \Config\Services::validation();
        $validate->setRules([
            'nama_kategori' => 'required',
            'deskripsi_kategori' => 'required',
        ]);

        if ($validate->withRequest($this->request)->run()) {
            $nama_kategori = $this->request->getPost('nama_kategori');
            $deskripsi_kategori = $this->request->getPost('deskripsi_kategori');
            $data = [
                'nama_kategori' => $nama_kategori,
                'deskripsi_kategori' => $deskripsi_kategori,
            ];
            $anggotaModel = new kategoriModel();
            $anggotaModel->insert($data);
        } else {
            return redirect()->back()->withInput()->with('errors', $validate->getErrors());
        }
    }
    public function updateAnggotaTabel()
    {
        // Get the request data
        $data = $this->request->getJSON();
        $model = new AnggotaModel();
        $data['anggota'] = $model->getAnggota();
        return view('dashboard/tabel_anggota', $data);

    }
    public function updateBukuTabel()
    {
        // Get the request data
        $data = $this->request->getJSON();
        $model = new bukuModel();
        $data['buku'] = $model->getBuku();
        return view('dashboard/tabel_buku', $data);

    }
    public function updateKategoriTabel()
    {
        // Get the request data
        $data = $this->request->getJSON();
        $model = new KategoriModel();
        $data['kategori'] = $model->getKategori();
        return view('dashboard/tabel_kategori', $data);

    }
}