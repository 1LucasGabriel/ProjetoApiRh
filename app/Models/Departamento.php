<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamentos' ;
    protected $fillable = ['nome', 'funcionario_id'];

    public function funcionarios (){
        return $this->hasMany(Funcionario::class, 'departamento_id', 'id');
    }
}
