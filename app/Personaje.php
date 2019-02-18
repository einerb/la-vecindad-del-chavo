<?php

namespace LaVecindadDelChavo;

use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    protected $fillable = ['titulo','nombre','apartamento','descripcion','avatar'];
    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}