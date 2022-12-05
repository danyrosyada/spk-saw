<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteriamodel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = ['id_kriteria', 'nama_kriteria', 'tipe'];

    public function getKriteria($idKriteria = false)
    {
        if ($idKriteria == false) {
            return $this->findAll();
        }

        return $this->where(['id_kriteria' => $idKriteria])->first();
    }
}
