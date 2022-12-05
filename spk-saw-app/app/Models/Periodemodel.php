<?php

namespace App\Models;

use CodeIgniter\Model;

class Periodemodel extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'id_periode';
    protected $allowedFields = ['id_periode', 'tahun',];

    public function getPeriode($idPeriode = false)
    {
        if ($idPeriode == false) {
            return $this->findAll();
        }

        return $this->where(['id_periode' => $idPeriode])->first();
    }
}
