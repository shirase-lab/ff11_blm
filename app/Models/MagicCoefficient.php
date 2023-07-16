<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MagicCoefficient extends Model
{
    use HasFactory;
    public function magic() : BelongsTo
    {
        return $this->belongsTo(Magic::class);
    }
}
