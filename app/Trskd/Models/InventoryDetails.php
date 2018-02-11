<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryDetails extends Model
{
    protected $table = "inventory_details";

    const DEBIT = 1;
    const CREDIT = 2;

    protected $fillable = ["unit_price","inventory_id","category_id","type","qty","debit","credit","total_amount","balance"];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
