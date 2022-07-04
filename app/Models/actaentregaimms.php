<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actaentregaimms extends Model
{
    public function Departamento(){
        return $this->hasOne('App\Models\dptos','id');
    }
    public function Provincia(){
        return $this->hasOne('App\Models\provs','id');
    }
    public function Distrito(){
        return $this->hasOne('App\Models\dists','id');
    }
}
