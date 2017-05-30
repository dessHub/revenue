<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id', 'user_id', 'category', 'location', 'registration', 'address', 'town'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
