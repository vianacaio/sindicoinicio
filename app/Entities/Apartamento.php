<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Apartamento extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'bloco',
        'nu_apt',
        'condominio_id'
    ];

    public function condominio() {
        return $this->belongsTo(Condominio::class);
    }

}
