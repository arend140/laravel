<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoCategoria extends Model
{   
    protected $table = 'produto_categoria';
    protected $fillable=['produto_id', 'categoria_id'];
}
