<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EquipPart extends Model
{
    use HasFactory;
    public function part() : BelongsTo
    {
        return $this->belongsTo(Part::class);
    }
}
