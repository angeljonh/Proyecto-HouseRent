<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    protected $table = 'propiedads';
    protected $fillable = ['user_id','nombre', 'descripcion','domicilio', 'numero' ,'zona_id' , 'cp','precio', 'area','camas', 'cuartos',
    'baños','telefono'];

    public function user()
    {
        return $this->belongsTo(Zona::class, 'user_id');
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }

    public function datos()
    {
        return $this->belongsToMany(Dato::class);
    }

    public function archivos()
    {
        return $this->morphMany(Archivo::class, 'modelo');
    }
}
