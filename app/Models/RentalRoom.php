<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalRoom extends Model
{

    protected $fillable=[

        'room_code',

        'type',

        'floor',

        'monthly_price',

        'facilities',

        'max_occupants',

        'area_m2',

        'photo',

        'status'

    ];

}