<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Deuda
 *
 * @property $id
 * @property $adeudo
 * @property $abono
 * @property $fecha_adeudo
 * @property $cliente_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cliente $cliente
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Deuda extends Model
{
    
    static $rules = [
		'adeudo' => 'required',
		'fecha_adeudo' => 'required',
		'cliente_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['adeudo','abono','fecha_adeudo','cliente_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    

}
