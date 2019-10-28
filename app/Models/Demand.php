<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = [
        'user_id',
        'description',
        'outcome',
        'rout_of_request',
        'telefone',
        'email',
        'solution_term',
        'name',
        'status',
        'solicitante',
        'cidade',
        'email',
        'telefone',
        'cidade,'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
