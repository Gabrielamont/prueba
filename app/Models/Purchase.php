<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = "purchases";

    protected $fillable = [
        'id','seller_user_id','buyer_user_id','product_id',
        'total','iva','total_iva','status','bill_id'
      ];

      public function product() {
        return $this->belongsTo('App\Models\Product', 'product_id');
      }

      public function seller() {
        return $this->belongsTo('App\Models\User', 'seller_user_id');
      }

      public function buyer() {
        return $this->belongsTo('App\Models\User', 'buyer_user_id');
      }
}
