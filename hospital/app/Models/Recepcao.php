<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepcao extends Model
{
    protected $table = 'recepcionista';
    
    use HasFactory;

    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }

    public function agendou(){
        return $this->hasMany(Agendou::class);
    }

}
