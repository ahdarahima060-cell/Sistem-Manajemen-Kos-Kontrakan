<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TenantContract extends Model
{
    use HasFactory;

    protected $table = 'tenant_contracts';

    protected $fillable = [
        'room_id',
        'tenant_name',
        'id_number',
        'phone',
        'emergency_contact',
        'contract_start',
        'contract_end',
        'monthly_rent',
        'deposit_paid',
        'payment_status',
        'notes',
    ];

    protected $casts = [
        'contract_start' => 'date',
        'contract_end' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(RentalRoom::class, 'room_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'contract_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'contract_id');
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'contract_id');
    }
}
