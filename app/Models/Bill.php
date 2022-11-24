<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    protected $fillable = [
        'client_id','total_amount','total_iva','order_identification'
    ];

    public function client() {
        return $this->belongsTo('App\Models\User', 'client_id');
      }

}
