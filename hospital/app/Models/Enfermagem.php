<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enfermagem extends Model
{
    protected $table = 'enfermeira';

    use HasFactory;

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
