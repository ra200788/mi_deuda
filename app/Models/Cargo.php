<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 *
 * @property $id
 * @property $name
 *
 * @property Cliente[] $clientes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargo extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente', 'cargo_id', 'id');
    }
    

}
