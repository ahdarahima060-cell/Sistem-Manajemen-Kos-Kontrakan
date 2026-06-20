<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'reminders';

    protected $fillable = [
        'contract_id',
        'reminder_type',
        'reminder_date',
        'message',
        'is_sent',
    ];

    protected $casts = [
        'reminder_date' => 'date',
        'is_sent' => 'boolean',
    ];

    public function contract()
    {
        return $this->belongsTo(TenantContract::class, 'contract_id');
    }
}
