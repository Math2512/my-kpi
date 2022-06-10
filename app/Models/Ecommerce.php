<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecommerce extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo('App\Models\Clients', 'clients_id');
    }

    public function getFormattedDate()
    {
        $date =  new \DateTime($this->data_at);

        return $date->format('d/m/Y');
    }
}
