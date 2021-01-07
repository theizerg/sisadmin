<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado_Ministerial extends Model
{
     protected $table = 'grado_ministerial';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nb_grado_ministerial'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'create_at',
    ];
}
