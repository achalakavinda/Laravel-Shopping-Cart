<?php

namespace App\Models\Ims;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ims\StockItem;
use App\Models\Ims\ItemCodeColor;

class ItemCode extends Model
{
    protected  $table = 'item_codes';
    protected $guarded = ['id'];

    public function brand(){
        return $this->belongsTo('App\Models\Ims\Brand');
    }

    public function stockItem(){
        return $this->hasMany('App\Models\Ims\StockItem');
    }
}