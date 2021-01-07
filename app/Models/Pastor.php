<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;


class Pastor extends Model
{
     use SearchableTrait;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */


    protected $searchable = [
        'columns' => [
          'pastor.tx_nombres' => 5,
          'pastor.tx_cedula' => 5,
        ]
    ];

    protected $dates = ['created_at'];
    protected $table = 'pastor';

    
    /**
     *  Below all methods are creating Eloquent's One to Many (inverse) Relationships.
     *  for example, many employees can have a same department.
     *
     */

        public function getEncodeIDAttribute()
    {
        return \Hashids::encode($this->id);
    }




    /**
     * @return object
     */
    public function empEstado(){
        /**
         *  return department which belongs to an employee.
         *  first parameter is the model and second is a
         *  foreign key.
         */
        return $this->belongsTo('App\Models\Estado','estado_id');
    }

    /**
     * @return object
     */
    public function empEstadoCivil(){
        return $this->belongsTo('App\Models\Estado_Civil','estado_civil_id');
    }

    /**
     * @return object
     */
    public function empGenero(){
        return $this->belongsTo('App\Models\Genero','genero_id');
    }

    /**
     * @return object
     */
    public function empGradoInstruccion(){
        return $this->belongsTo('App\Models\Grado_Instruccion','grado_instruccion_id');
    }

    /**
     * @return object
     */
    public function empGradoMinisterial(){
        return $this->belongsTo('App\Models\Grado_Ministerial','grado_ministerial_id');
    }

    /**
     * @return object
     */
    public function empNacionalidad(){
        return $this->belongsTo('App\Models\Nacionalidad','nacionalidad_id');
    }

    /**
     * @return object
     */
    public function empPais(){
        return $this->belongsTo('App\Models\Pais','lugar_nacimiento_id');
    }

        /**
     * @return object
     */
    public function empTipoSangre(){
        return $this->belongsTo('App\Models\TipoSangre','tipo_sangre_id');
    }
}
