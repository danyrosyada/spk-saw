<?php

namespace App\Controllers;

use App\Models\Karyawanmodel;


class Karyawan extends BaseController
{
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }

    public function index()
    {
        $KaryawanModel = new KaryawanModel();
        $data = [
            'karyawan' => $KaryawanModel->getKaryawan(),
        ];
        return view('karyawan/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('karyawan/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'jns_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/karyawan/add')->withInput();
        }

        $this->KaryawanModel->save([
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jns_kel' => $this->request->getVar('jns_kel'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('karyawan');
    }

    public function ubah($id)
    {
        session();
        $data = [
            'title' => 'Ubah Karyawan',
            'validation' => \Config\Services::validation(),
            'karyawan' => $this->KaryawanModel->getKaryawan($id),
        ];
        return view('karyawan/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'jns_kel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/karyawan/ubah/' . $id)->withInput();
        }
        $this->KaryawanModel->update($id, [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jns_kel' => $this->request->getVar('jns_kel'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Rubah Ya!');
        return redirect()->to('karyawan');
    }


    public function hapus($id)
    {
        $this->KaryawanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Anda Sudah dihapus!');
        return redirect()->to('karyawan');
    }
}
