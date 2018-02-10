<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolInfo extends Model
{
    protected $table = "school_information";

    public $timestamps = true;
    protected $fillable = ['owner', 'name', 'city', 'address', 'phone', 'image'];
}
