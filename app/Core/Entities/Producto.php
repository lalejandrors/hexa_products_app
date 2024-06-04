<?php

namespace App\Core\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'precio',
        'stock'
    ];

    public function categorias(){
        return $this->belongsToMany(\App\Core\Entities\Categoria::class, 'prodcate', 'id_producto', 'id_categoria');
    }
}
