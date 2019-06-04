<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'description'
    ];

    //.Relaciones.

    Public function permissions(){
        return $this->hasMany('App\Permission');
    }

    public function users(){
        return $this->belongsToMany('app\User')->withTimestamps();

    }

    //.Almacenamiento.

    public function store($request){

        $slug = str_slug($request->name, '-');

        return self::create($request->all() + [
            'slug' => $slug,
        ]);

        alert()->success('Exito','El rol fue guardado con éxito')->showConfirmButton();
    }

    public function my_update($request){

        $slug = str_slug($request->name, '-');

        self::update($request->all() + [
            'slug' => $slug,
        ]);

        alert()->success('Exito','El rol fue actualizado con éxito')->showConfirmButton();

    }


    //.Validación.

    //.Recuperación.de.Información

    //.Otras.Operaciones
}
