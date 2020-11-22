<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    protected $guarded = ['id'];

    public function itemCode(){
        return $this->belongsTo('App\Models\Ims\ItemCode');
    }

    public function itemCodeColor(){
        return $this->belongsTo('App\Models\Ims\ItemCodeColor');
    }
    
    public function itemCodeSize(){
        return $this->belongsTo('App\Models\Ims\ItemCodeSize');
    }
}