<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $guarded = ['id'];

    public function purchaseOrderItem(){
        return $this->hasMany('App\Models\Ims\PurchaseOrderItem');
    }
}