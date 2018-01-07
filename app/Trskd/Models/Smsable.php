<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Smsable extends Model
{
    protected $table = "smsable";
    protected $fillable = ['user_id', 'text','receiver'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
