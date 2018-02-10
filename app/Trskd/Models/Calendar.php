<?php

namespace App\Trskd\Models;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = "calendar";

    public $timestamps = true;

    protected $fillable = ['user_id', 'description', 'start_date', 'end_date', 'backgroundColor', 'foregroundColor'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
