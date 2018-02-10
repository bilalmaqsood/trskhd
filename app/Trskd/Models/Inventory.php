<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventory";

    public $timestamps = true;
    protected $fillable = ['year', 'month', 'amount', 'title', 'description', 'type'];
}
