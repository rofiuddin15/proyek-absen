<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PerformanceReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'report_description'
    ];

    public function file(): HasOne
    {
        return $this->hasOne(PerformanceReportFile::class, 'performance_report_id', 'id');
    }

    
}
