<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $table = "logo";

    protected $fillable = ['name','type'];
}
