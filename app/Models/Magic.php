<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magic extends Model
{
    use HasFactory;
    public function coefficients()
    {
        return $this->hasMany(MagicCoefficient::class);
    }
}
