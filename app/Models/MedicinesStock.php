<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinesStock extends Model
{
    use HasFactory;

    protected $table = 'medicines_stocks';

    public function getMedicinesName(){
        return $this->belongsTo(MedicinesModel::class,'medicines_model_id');
    }
}
