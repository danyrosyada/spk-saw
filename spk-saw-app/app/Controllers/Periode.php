<?php

namespace App\Controllers;

use App\Models\Periodemodel;

class Periode extends BaseController
{
    public function __construct()
    {
        $this->PeriodeModel = new Periodemodel();
    }

    public function index()
    {
        $PeriodeModel = new Periodemodel();
        $data = [
            'periode' => $PeriodeModel->getPeriode(),
        ];
        return view('periode/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('periode/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/periode/add')->withInput();
        }

        $this->PeriodeModel->save([
            'tahun' => $this->request->getVar('tahun'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('periode');
    }

    public function ubah($id)
    {
        session();
        $data = [
            'title' => 'Ubah periode',
            'validation' => \Config\Services::validation(),
            'periode' => $this->PeriodeModel->getPeriode($id),
        ];
        return view('periode/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/periode/ubah/' . $id)->withInput();
        }
        $this->PeriodeModel->update($id, [
            'tahun' => $this->request->getVar('tahun'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Rubah Ya!');
        return redirect()->to('periode');
    }

    public function hapus($id)
    {
        $this->PeriodeModel->delete($id);
        session()->setFlashdata('pesan', 'Data Anda Sudah dihapus!');
        return redirect()->to('periode');
    }
}
