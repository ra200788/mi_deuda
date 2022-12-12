<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $nombre
 * @property $apellidos
 * @property $telefono
 * @property $cargo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cargo $cargo
 * @property Deuda[] $deudas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'cargo_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidos','telefono','cargo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deudas()
    {
        return $this->hasMany('App\Models\Deuda', 'cliente_id', 'id');
    }
    

}
