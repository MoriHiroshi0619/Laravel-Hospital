<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    protected $table = 'medico';
    use HasFactory;
    
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
