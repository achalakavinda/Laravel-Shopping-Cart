<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    protected $fillable  = ['stock_id','item_code_id','item_code_color_id','item_code_size_id','open_qty','remain_qty','cost','selling_price'];

    public function stock(){
        return $this->belongsTo('App\Models\Ims\Stock');
    }

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