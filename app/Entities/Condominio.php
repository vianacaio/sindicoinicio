<?php
namespace App\Entities;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Condominio extends Model implements Transformable
{
    use TransformableTrait;
    protected $fillable = [
    	'no_condominio'
    ];
}