<?php

namespace App\Models;

use CodeIgniter\Model;

class Karyawanmodel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['id_karyawan', 'nip', 'nama', 'jns_kel', 'alamat', 'no_hp'];

    public function getKaryawan($idKaryawan = false)
    {
        if ($idKaryawan == false) {
            return $this->findAll();
        }

        return $this->where(['id_karyawan' => $idKaryawan])->first();
    }
}
