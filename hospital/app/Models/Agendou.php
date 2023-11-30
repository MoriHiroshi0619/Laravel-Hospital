<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendou extends Model
{
    protected $table = 'agendou';
    use HasFactory;

    public function repecepcao(){
        return $this->belongsTo('App\models\Recepcao');
    }
}
