<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nota extends Model
{
    use SoftDeletes;
    //fillable
    // Listagem de campos para nserção no banco
    protected $fillable = ['titulo', 'texto'];
}
