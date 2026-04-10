<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{

    protected $fillable = [
        'project_id', 'hours_included',
        'hourly_rate', 'starts_at', 'ends_at'
    ];

}
