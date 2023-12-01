<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendou extends Model
{
    protected $table = 'agendou';
    use HasFactory;

    public function recepcionista(){
        return $this->belongsTo(Recepcao::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

}
