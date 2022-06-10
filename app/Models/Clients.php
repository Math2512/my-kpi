<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'clients_id'];
    public function users()
    {
        return $this->hasOne('App\Models\User');
    }

    public function instagrams()
    {
        return $this->hasMany('App\Models\Instagram');
    }

    public function ecommerces()
    {
        return $this->hasMany('App\Models\Ecommerce');
    }
}
