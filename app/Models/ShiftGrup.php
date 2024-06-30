<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShiftGrup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shift_presence(): BelongsTo
    {
        return $this->belongsTo(ShiftPresence::class);
    }
}
