<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equip extends Model
{
    use HasFactory;
    public function part() : BelongsTo
    {
        return $this->belongsTo(Part::class);
    }
    public function type() : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    public function augments()
    {
        return $this->hasMany(Augment::class);
    }

}
