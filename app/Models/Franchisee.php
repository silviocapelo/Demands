<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Franchisee extends Model
{
    protected $filable = [
        'user_id',
        'name',
        'email',
        'status', 
        'addresses',
        'number',
        'neighborhood',
        'city',
        'country',
        'fone',
        'cell_fone',
        'cnpj',
        'observation',
        'userfrach'
      
    ];
    public function franchiseeUsers()
    {
        //return $this->hasMany('App\User');
        return $this->belongsTo(user::class);
    }
}
