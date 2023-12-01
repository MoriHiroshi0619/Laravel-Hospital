<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';

    use HasFactory;

    public function agendou(){
        return $this->hasMany(Agendou::class);
    }
}
