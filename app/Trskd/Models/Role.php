<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public $timestamps = true;
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
