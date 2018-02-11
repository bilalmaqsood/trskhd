<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventories";

    protected $fillable = ["title","month","year"];

    public function inventories(){
        return $this->hasMany(InventoryDetails::class);
    }
}
