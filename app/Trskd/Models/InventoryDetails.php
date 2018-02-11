<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryDetails extends Model
{
    protected $table = "inventory_details";

    protected $fillable = ["price","category_id","qty","debit","credit","balance"];

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
