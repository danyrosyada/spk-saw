<?php


namespace App\Controllers;

use App\Models\Kriteriamodel;

class Kriteria extends BaseController
{

    public function __construct()
    {
        $this->KriteriaModel = new KriteriaModel();
    }

    public function index()
    {
        $KriteriaModel = new KriteriaModel();
        $data = [
            'kriteria' => $KriteriaModel->getKriteria(),
        ];
        return view('kriteria/index', $data);
    }

    public function add()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('kriteria/add', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'tipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/kriteria/add')->withInput();
        }

        $this->KriteriaModel->save([
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
            'tipe' => $this->request->getVar('tipe'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Ditambahkan');
        return redirect()->to('kriteria');
    }

    public function ubah($id)
    {
        session();
        $data = [
            'title' => 'Ubah Kriteria',
            'validation' => \Config\Services::validation(),
            'kriteria' => $this->KriteriaModel->getKriteria($id),
        ];
        return view('kriteria/ubah', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama_kriteria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
            'tipe' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib di isi',
                ]
            ],
        ])) {

            return redirect()->to('/kriteria/ubah/' . $id)->withInput();
        }
        $this->KriteriaModel->update($id, [
            'nama_kriteria' => $this->request->getVar('nama_kriteria'),
            'tipe' => $this->request->getVar('tipe'),
        ]);

        session()->setFlashdata('pesan', 'Data Sudah Berhasil Rubah Ya!');
        return redirect()->to('kriteria');
    }

    public function hapus($id)
    {
        $this->KriteriaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Anda Sudah dihapus!');
        return redirect()->to('kriteria');
    }
}
