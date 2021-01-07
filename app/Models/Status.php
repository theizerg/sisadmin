<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $dates = ['deleted_at','created_at','updated_at'];

    protected $fillable = [
        'nu_status'
    ];
}
