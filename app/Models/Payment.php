<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'contract_id',
        'payment_month',
        'amount',
        'payment_date',
        'status',
        'notes',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    public function contract()
    {
        return $this->belongsTo(TenantContract::class, 'contract_id');
    }
}
