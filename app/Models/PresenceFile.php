<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PresenceFile extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that owns the PresenceFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presence(): BelongsTo
    {
        return $this->belongsTo(Presence::class);
    }

}
