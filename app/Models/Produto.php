<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Produto extends Model
{
    protected $fillable = ['nome', 'preco', 'descricao', 'imagem'];

    public function categoria():BelongsToMany{
        return $this->belongsToMany(Categoria::class, 'produto_categoria', 'produto_id', 'categoria_id');
	}
}