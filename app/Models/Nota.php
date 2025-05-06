<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //fillable
    // Listagem de campos para nserção no banco
    protected $fillable = ['texto'];
}
