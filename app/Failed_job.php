<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failed_job extends Model
{
    protected $fillable = ['connection', 'queue', 'payload', 'exception', 'failed_at'];
}
