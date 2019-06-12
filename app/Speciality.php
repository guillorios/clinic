<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $fillable = [
        'name'
    ];

    /* Relaciones */

    public function users(){
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    /* Almacenamiento */

    public function store($request){
        return self::create($request->all());
    }

    public function my_update($request){
        return self::update($request->all());
    }


}
