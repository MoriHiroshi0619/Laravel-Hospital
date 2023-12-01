<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    protected $table = 'administrativo';
    use HasFactory;
    public function funcionario(){
        return $this->belongsTo(Funcionario::class);
    }
}
