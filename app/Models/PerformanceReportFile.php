<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PerformanceReportFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'performance_report_id',
        'photo'
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(PerformanceReport::class, 'performance_report_id', 'id');
    }

}
