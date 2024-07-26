<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Presence extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user associated with the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_profile(): HasOne
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'user_id');
    }

    /**
     * Get all of the comments for the Presence
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presence_files(): HasMany
    {
        return $this->hasMany(PresenceFile::class, 'presence_id', 'id');
    }
}
