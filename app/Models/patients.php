<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    protected $fillable = ['nama', 'phone', 'address', 'status', 'in_date', 'out_date'];
}
