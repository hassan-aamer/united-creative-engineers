<?php

namespace App\Models;

use App\Models\Model;

class Contact extends Model
{
    protected $guarded = [''];
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
