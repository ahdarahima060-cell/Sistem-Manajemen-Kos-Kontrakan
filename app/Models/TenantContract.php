<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TenantContract extends Model
{

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
        'notes'

    ];


    public function room()
    {
        return $this->belongsTo(
            RentalRoom::class,
            'room_id'
        );
    }


    public function reminders()
    {
        return $this->hasMany(
            Reminder::class,
            'contract_id'
        );
    }

}