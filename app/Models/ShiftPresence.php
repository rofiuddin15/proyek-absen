<?php

namespace App\Models;

use App\Models\ShiftGrup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShiftPresence extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shift_grup(): BelongsTo
    {
        return $this->belongsTo(ShiftGrup::class);
    }
}
